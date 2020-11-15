<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Packet;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\Models\Users;
use http\Client\Curl\User;

class LuxPacketController extends Controller
{
    public function implement_bonuses($user_packet_id)
    {
        $user_packet = UserPacket::where(['user_packet_id' => $user_packet_id])->first();
        $user_id = $user_packet->user_id;
        $packet_id = $user_packet->packet_id;

        if ($packet_id != Packet::LUX) {
            return [
                'success' => false,
                'message' => 'Пакет не является LUX.',
            ];
        }

        $packetBoughtUser = Users::where(['user_id' => $user_id])->first();
        $parentUser = Users::where(['user_id' => $packetBoughtUser->recommend_user_id])->first();


        $counter = 0;
        $balance = 1;
        while (isset($parentUser) && $parentUser->user_id != 1) {
            if (Users::user_has_packet($parentUser->user_id, Packet::LUX)) {
                $parentUser->lv_balance = $parentUser->lv_balance + $balance;
                if ($parentUser->save()) {
                    $this->record_lux_packet_user_operation($user_id, $parentUser->user_id, $balance, $counter);
                }
                $parent_lv_balance = $parentUser->lv_balance;
                if ($parent_lv_balance % 10 == 0 && $parent_lv_balance <= 50) {
                    $check = $this->check_for_reward($parentUser->user_id);

                    if ($check) {
                        $this->give_bonuses($parentUser->user_id);
                    }
                }
            }
            $parentUser = Users::where(['user_id' => $parentUser->recommend_user_id])->first();

            $counter++;
            if ($counter == 10) {
                break;
            }

        }

        return [
            'success' => true,
            'message' => 'Ok',
        ];
    }

    public function check_for_reward($user_id)
    {
        $user = Users::where(['user_id' => $user_id])->first();
        $parent = Users::where(['user_id' => $user->recommend_user_id])->first();

        $child = Users::where(['recommend_user_id' => $parent->user_id])
            ->where('lv_balance', '>=', $user->lv_balance)->get();

        $limit_order = round($user->lv_balance / 10, 1);

        $limit = $parent->lux_bonus_limit;

        if (count($child) >= 3 && Users::user_has_packet($parent->user_id, Packet::LUX) && $limit_order == $limit) {
            return true;
        }
        return false;

    }

    public function give_bonuses($user_id)
    {
        $user = Users::where(['user_id' => $user_id])->first();
        $bonusRecipientParent = Users::where(['user_id' => $user->recommend_user_id])->first();
        $bonusInKzt = 2000000;
        $bonus = ($bonusInKzt / Currency::DollarToKzt);

        $bonusRecipientParent->user_money = $bonusRecipientParent->user_money + $bonus;
        $bonusRecipientParent->lux_bonus_limit = $bonusRecipientParent->lux_bonus_limit + 1;
        $bonusRecipientParent->save();
        $this->record_get_bonus_from_lux_packet($bonusRecipientParent->user_id, $bonus);


    }

    public function record_lux_packet_user_operation($author_id, $recipient_id, $bonus, $counter)
    {
        $counter++;
        $operation = new UserOperation();
        $operation->author_id = $author_id;
        $operation->recipient_id = $recipient_id;
        $operation->lv_balance = $operation->lv_balance + $bonus;
        $operation->operation_id = 1;
        $operation->operation_type_id = 35;
        $operation->operation_comment = sprintf('Цикличный доход %s -уровень от пакета LUX в размере %s LV ', $counter, $bonus);
        $operation->save();
    }

    public function record_get_bonus_from_lux_packet($recipient_id, $bonus)
    {
        $bonus = $bonus * (Currency::PVtoKzt / Currency::DollarToKzt);
        $operation = new UserOperation();
        $operation->author_id = null;
        $operation->recipient_id = $recipient_id;
        $operation->money = $bonus;
        $operation->operation_id = 1;
        $operation->operation_type_id = 1;
        $operation->operation_comment = sprintf('Поздравляем, вы получили активный доход в размере. %s pv (%s тенге)', $bonus, $bonus * Currency::DollarToKzt);
        $operation->save();
    }
}