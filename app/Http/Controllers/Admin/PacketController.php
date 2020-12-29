<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Currency;
use App\Models\Fond;
use App\Models\Operation;
use App\Models\Packet;
use App\Models\UserOperation;
use App\Models\UserPacket;
use App\Models\Users;
use App\Models\UserStatus;
use DB;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use URL;
use View;

class PacketController extends Controller
{
    public $sentMoney = 0;

    public function __construct()
    {
        $this->middleware('profile', ['except' => ['AcceptUserPacketPayBox', 'acceptPacketFunction', 'implementPacketBonuses']]);
        $this->middleware('admin', ['only' => ['inactiveUserPacket', 'activeUserPacket', 'deleteInactiveUserPacket', 'acceptInactiveUserPacket']]);
    }

    public function getPacketById($id)
    {
        $packet = Packet::find($id);
        $result['status'] = false;
        $result['title'] = $packet->packet_name_ru;
        $result['desc'] = $packet->packet_desc_ru;
        $result['image'] = '<a class="fancybox" href="' . $packet->packet_image . '">
                                     <img src="' . $packet->packet_image . '" style="width:100%">
                                 </a>';
        return response()->json($result);
    }

    public function activeUserPacket(Request $request)
    {
        $row = UserPacket::leftJoin('users', 'users.user_id', '=', 'user_packet.user_id')
            ->leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->leftJoin('users as recommend', 'recommend.user_id', '=', 'users.recommend_user_id')
            ->leftJoin('city', 'city.city_id', '=', 'users.city_id')
            ->leftJoin('country', 'country.country_id', '=', 'city.country_id')
            ->where('user_packet.is_active', 1)
            ->orderBy('user_packet.user_packet_id', 'desc')
            ->select('users.*', 'user_packet.*', 'packet.*', 'city.*', 'country.*',
                'recommend.name as recommend_name',
                'recommend.user_id as recommend_id',
                'recommend.login as recommend_login',
                'recommend.last_name as recommend_last_name',
                'recommend.user_id as recommend_user_id',
                DB::raw('DATE_FORMAT(user_packet.created_at,"%d.%m.%Y %H:%i") as date'));

        if (isset($request->user_name) && $request->user_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('users.name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.last_name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.login', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.email', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.middle_name', 'like', '%' . $request->user_name . '%');
            });

        if (isset($request->sponsor_name) && $request->sponsor_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('recommend.name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.last_name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.login', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.email', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.middle_name', 'like', '%' . $request->sponsor_name . '%');
            });

        if (isset($request->packet_name) && $request->packet_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('packet.packet_name_ru', 'like', '%' . $request->packet_name . '%');
            });

        if (isset($request->date_from) && $request->date_from != '') {
            $timestamp = strtotime($request->date_from);
            $row->where(function ($query) use ($timestamp) {
                $query->where('user_packet.created_at', '>=', date("Y-m-d H:i", $timestamp));
            });
        }

        if (isset($request->date_to) && $request->date_to != '') {
            $timestamp = strtotime($request->date_to);
            $row->where(function ($query) use ($timestamp) {
                $query->where('user_packet.created_at', '<=', date("Y-m-d H:i", $timestamp));
            });
        }

        $row = $row->paginate(10);

        return view('admin.active-user-packet.packet', [
            'row' => $row,
            'request' => $request
        ]);
    }

    public function inactiveUserPacket(Request $request)
    {
        $row = UserPacket::leftJoin('users', 'users.user_id', '=', 'user_packet.user_id')
            ->leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->leftJoin('users as recommend', 'recommend.user_id', '=', 'users.recommend_user_id')
            ->where('user_packet.is_active', 0)
            ->orderBy('user_packet.user_packet_id', 'desc')
            ->select('users.*', 'user_packet.*', 'packet.*',
                'recommend.name as recommend_name',
                'recommend.user_id as recommend_id',
                'recommend.login as recommend_login',
                'recommend.last_name as recommend_last_name',
                'recommend.user_id as recommend_user_id',
                DB::raw('DATE_FORMAT(user_packet.created_at,"%d.%m.%Y %H:%i") as date'));

        if (isset($request->user_name) && $request->user_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('users.name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.last_name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.login', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.email', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.middle_name', 'like', '%' . $request->user_name . '%');
            });

        if (isset($request->sponsor_name) && $request->sponsor_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('recommend.name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.last_name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.login', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.email', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.middle_name', 'like', '%' . $request->sponsor_name . '%');
            });

        if (isset($request->packet_name) && $request->packet_name != '')
            $row->where(function ($query) use ($request) {
                $query->where('packet.packet_name_ru', 'like', '%' . $request->packet_name . '%');
            });

        $row = $row->paginate(10);

        return view('admin.inactive-user-packet.packet', [
            'row' => $row,
            'request' => $request
        ]);
    }

    public function sendResponseAddPacket(Request $request)
    {
        $packet = Packet::where('packet_id', $request->packet_id)->first();

        if ($packet == null) {
            $result['message'] = 'Такого пакета не существует';
            $result['status'] = false;
            return response()->json($result);
        }


        if ($packet->is_upgrade_packet) {
            $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                ->where('user_id', Auth::user()->user_id)
                ->where('user_packet.is_active', '=', '0')
                ->count();

            if ($is_check > 0) {
                $result['message'] = 'Вы уже отправили запрос на другой пакет, сначала отмените тот запрос';
                $result['status'] = false;
                return response()->json($result);
            }

            $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                ->where('user_packet.user_id', Auth::user()->user_id)
                ->where('user_packet.packet_id', '>=', $request->packet_id)
                ->where('user_packet.is_active', 1)
                ->count();

            if ($is_check > 0) {
                $result['message'] = 'Вы не можете купить этот пакет, так как вы уже приобрели другой пакет';
                $result['status'] = false;
                return response()->json($result);
            }

        }

        $is_check = UserPacket::where('user_id', Auth::user()->user_id)->where('packet_id', '=', $request->packet_id)->count();
        $count = UserPacket::where('user_id', Auth::user()->user_id)->whereIn('packet_id', [1, 2, 3, 4])->count();

        if ($is_check > 0) {
            $result['message'] = 'Вы уже отправили запрос на этот пакет';
            $result['status'] = false;
            return response()->json($result);
        }
        if ($request->packet_id == 5 && $count == 0) {
            $result['message'] = 'Вы не можете купить этот пакет, так как вы не приобрели другой пакет';
            $result['status'] = false;
            return response()->json($result);
        }


        $packet = Packet::where('packet_id', $request->packet_id)->first();

        $user_packet = new UserPacket();
        $user_packet->user_id = Auth::user()->user_id;
        $user_packet->packet_id = $request->packet_id;
        $user_packet->user_packet_type = $request->user_packet_type;
        $user_packet->packet_price = $packet->packet_price;
        $user_packet->is_active = false;
        $user_packet->is_portfolio = '';
        $user_packet->save();

        $result['message'] = 'Вы успешно отправили запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function buyPacketFromBalance(Request $request)
    {
        try {
            $packet = Packet::where('packet_id', $request->packet_id)->first();
            if ($packet == null) {
                $result['message'] = 'Такого пакета не существует';
                $result['status'] = false;
                return response()->json($result);
            }
            $packet_old_price = 0;

            if ($packet->is_upgrade_packet) {
                $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                    ->where('user_id', Auth::user()->user_id)
                    ->where('is_active', '=', '0')
                    ->count();

                if ($is_check != 0) {
                    $result['message'] = 'Вы уже отправили запрос на другой пакет, сначала отмените тот запрос';
                    $result['status'] = false;
                    return response()->json($result);
                }

                $is_check = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
                    ->where('user_packet.user_id', Auth::user()->user_id)
                    ->where('user_packet.packet_id', '>=', $request->packet_id)
                    ->where('user_packet.is_active', 1)
                    ->count();

                if ($is_check > 0) {
                    $result['message'] = 'Вы не можете купить этот пакет, так как вы уже приобрели другой пакет';
                    $result['status'] = false;
                    return response()->json($result);
                }


                $packet_old_price = UserPacket::beforePurchaseSum(Auth::user()->user_id);

            }

            $total_packet_price_in_pv = $packet->packet_price - $packet_old_price;
            if ($packet->packet_id == Packet::LUX) {
                $total_packet_price_in_pv = $packet->packet_price;
            }
            $dollar_price = $total_packet_price_in_pv * (Currency::PVtoKzt / Currency::DollarToKzt);

            $is_check = UserPacket::where('user_id', Auth::user()->user_id)->where('packet_id', '=', $request->packet_id)->count();

            if ($is_check > 0) {
                $result['message'] = 'Вы уже отправили запрос на этот пакет';
                $result['status'] = false;
                return response()->json($result);
            }
            if (Auth::user()->user_money < $total_packet_price_in_pv) {
                $result['message'] = 'У вас не хватает баланса чтобы купить этот пакет';
                $result['status'] = false;
                return response()->json($result);
            }


            $user_packet = new UserPacket();
            $user_packet->user_id = Auth::user()->user_id;
            $user_packet->packet_id = $request->packet_id;
            $user_packet->user_packet_type = $request->user_packet_type;
            $user_packet->packet_price = $total_packet_price_in_pv;
            $user_packet->is_active = 0;
            $user_packet->is_portfolio = '';
            $user_packet->is_portfolio = '';
            $user_packet->save();

            $operation = new UserOperation();
            $operation->author_id = Auth::user()->user_id;
            $operation->recipient_id = null;
            $operation->money = $total_packet_price_in_pv;
            $operation->pv_balance = $total_packet_price_in_pv;
            $operation->operation_id = 2;
            $operation->operation_type_id = 30;
            $operation->operation_comment = $request->comment;
            $operation->save();


            $user = Users::find(Auth::user()->user_id);
            $rest_mooney = $user->user_money - $dollar_price;
            $user->user_money = $rest_mooney;
            $user->save();

            $isImplementPacketBonus = $this->implementPacketBonuses($user_packet->user_packet_id);


            $result['message'] = 'Вы успешно купили пакет';
            $result['result'] = $isImplementPacketBonus;
            $result['status'] = true;
        } catch (\Exception $e) {
            $message = ($e->getMessage() . ' / ' . $e->getFile() . '/' . $e->getLine());
            $result = [
                'message' => $message,
                'status' => false,
            ];
        }

        return response()->json($result);
    }

    public function cancelResponsePacket(Request $request)
    {
        $is_check = UserPacket::where('user_id', Auth::user()->user_id)
            ->where('packet_id', $request->packet_id)
            ->where('is_active', 0)
            ->first();

        if ($is_check == null) {
            $result['message'] = 'Такого запроса не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $is_check->delete();

        $result['message'] = 'Вы успешно отменили запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function deleteInactiveUserPacket(Request $request)
    {
        $user_packet = UserPacket::find($request->packet_id);
        $user_packet->forceDelete();
    }

    public function acceptInactiveUserPacket(Request $request)
    {
        $result = [];
        try {
            $this->implementPacketBonuses($request->packet_id);
        } catch (\Exception $exception) {
            var_dump($exception->getMessage() . ' / ' . $exception->getLine());
        }

        $result['message'] = 'Вы успешно приняли запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function generatePayBoxCode(Request $request)
    {
        $packet = Packet::where('packet_id', $request->packet_id)->first();
        if ($packet == null) {
            $result['message'] = 'Такого пакета не существует';
            $result['status'] = false;
            return response()->json($result);
        }


        $packet_old_price = 0;
        if ($packet->condition_minimum_status_id > 0) {

            $status = UserStatus::where('user_status_id', Auth::user()->status_id)->first();
            $status_condition = UserStatus::where('user_status_id', $packet->condition_minimum_status_id)->first();

            if ($status == null || $status->sort_num < $status_condition->sort_num) {
                $result['message'] = 'У вас должно быть статус - ' . $status_condition->user_status_name . " и выше";
                $result['status'] = false;
                return response()->json($result);
            }
        }

        if ($packet->is_upgrade_packet == 1) {

            $is_check = UserPacket::where('user_id', Auth::user()->user_id)
                ->where('is_active', '=', '0')
                ->where('user_packet.packet_id', '!=', 9)
                ->where('is_portfolio', '=', $packet->is_portfolio)
                ->count();

            if ($is_check > 0) {
                $result['message'] = 'Вы уже отправили запрос на другой пакет, сначала отмените тот запрос';
                $result['status'] = false;
                return response()->json($result);
            }

            if ($request->packet_id > 2) {
                $is_check = UserPacket::where('user_id', Auth::user()->user_id)
                    ->where('packet_id', '>=', $request->packet_id)
                    ->where('is_portfolio', '=', $packet->is_portfolio)
                    ->where('user_packet.packet_id', '!=', 9)
                    ->where('is_active', 1)
                    ->count();

                if ($is_check > 0) {
                    $result['message'] = 'Вы не можете купить этот пакет, так как вы уже приобрели другой пакет';
                    $result['status'] = false;
                    return response()->json($result);
                }
            }
            $packet_old_price = UserPacket::beforePurchaseSum(Auth::user()->user_id);
        }


        $is_check = UserPacket::where('user_id', Auth::user()->user_id)->where('packet_id', '=', $request->packet_id)->count();
        if ($is_check > 0) {
            $result['message'] = 'Вы уже отправили запрос на этот пакет';
            $result['status'] = false;
            return response()->json($result);
        }


        $packet = Packet::where('packet_id', $request->packet_id)->first();

        $user_packet = new UserPacket();
        $user_packet->user_id = Auth::user()->user_id;
        $user_packet->packet_id = $request->packet_id;
        $user_packet->user_packet_type = $request->user_packet_type;
        $user_packet->packet_price = $packet->packet_price - $packet_old_price;
        $user_packet->is_active = 0;
        $user_packet->is_epay = 1;

        $user_packet->is_portfolio = $packet->is_portfolio;

        try {
            $user_packet->save();

            $href = "";

            $rand_str = "z";
            $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
            for ($i = 0; $i < 10; $i++) {
                $rand_str .= $characters[rand(0, strlen($characters) - 1)];
            }

            include_once("PG_Signature.php");
            $MERCHANT_SECRET_KEY = "AFPWZXFUBoBL0RWb";

            $arrReq = array();

            $currency = Currency::where('currency_name', 'тенге')->first();

            /* Обязательные параметры */
            $arrReq['pg_merchant_id'] = 500436;// Идентификатор магазина
            $arrReq['pg_order_id'] = $user_packet->user_packet_id;        // Идентификатор заказа в системе магазина
            $arrReq['pg_amount'] = $user_packet->packet_price * $currency->money;        // Сумма заказа
            $arrReq['pg_result_url'] = URL('/') . "/admin/packet/paybox/success/" . $user_packet->user_packet_id;
            $arrReq['pg_success_url'] = URL('/') . "/admin/packet/paybox/success/" . $user_packet->user_packet_id;
            $arrReq['pg_failure_url'] = URL('/') . "/admin/shop?error=Ошибка";
            $arrReq['pg_description'] = "Покупка пакета на QazaqMedia"; // Описание заказа (показывается в Платёжной системе)
            $arrReq['pg_salt'] = $rand_str;
            $arrReq['pg_request_method'] = "GET";
            $arrReq['pg_success_url_method'] = 'AUTOGET';
            $arrReq['pg_sig'] = \PG_Signature::make('payment.php', $arrReq, $MERCHANT_SECRET_KEY);

            $file = "log.txt";
            $current = file_get_contents($file);
            $current .= $arrReq['pg_merchant_id'] . "\n";
            $current .= $arrReq['pg_order_id'] . "\n";
            $current .= $arrReq['pg_amount'] . "\n";
            $current .= $arrReq['pg_result_url'] . "\n";
            $current .= $arrReq['pg_success_url'] . "\n";
            $current .= $arrReq['pg_failure_url'] . "\n";
            $current .= $arrReq['pg_description'] . "\n";
            $current .= $arrReq['pg_salt'] . "\n";
            $current .= $arrReq['pg_request_method'] . "\n";
            $current .= $arrReq['pg_success_url_method'] . "\n";
            $current .= $arrReq['pg_sig'] . "\n";

            $query = http_build_query($arrReq);
            $current .= $query . "\n";
            file_put_contents($file, $current);

            $href = $query;
            $result['href'] = $href;
        } catch (Exception $ex) {
            $result['message'] = 'Ошибка база данных';
            $result['status'] = false;
            return response()->json($result);
        }


        $result['message'] = 'Вы успешно отправили запрос';
        $result['status'] = true;
        return response()->json($result);
    }

    public function acceptUserPacketPaybox(Request $request, $user_packet_id)
    {
        if (isset($request->pg_result) && $request->pg_result == 1) {
            $this->implementPacketBonuses($user_packet_id);
            return redirect('/admin/index?message=Вы успешно купили пакет');
        }
    }

    public function implementPacketBonuses($userPacketId)
    {
        $inviter_order = 1;
        $userPacket = UserPacket::find($userPacketId);
        $actualStatuses = [UserStatus::CLIENT, UserStatus::CONSULTANT, UserStatus::MANAGER, UserStatus::DIRECTOR];

        if (!$userPacket) {
            $result['message'] = 'Ошибка';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet = Packet::where(['packet_id' => $userPacket->packet_id])->first();
        $user = Users::where(['user_id' => $userPacket->user_id])->first();
        $inviter = Users::where(['user_id' => $user->recommend_user_id])->first();

        if (!$packet || !$user) {
            $result['message'] = 'Ошибка, пользователь, пригласитель или пакет был не найден!';
            $result['status'] = false;
            return response()->json($result);
        }

        $this->activatePackage($userPacket);

        if ($packet->packet_id == Packet::LUX) {
            app(LuxPacketController::class)->implement_bonuses($userPacketId);
        } else {
            while ($inviter && in_array($packet->packet_id, Packet::actualPacket())) {
                $bonus = 0;
                $packetPrice = $userPacket->packet_price;
                $inviterPacketId = UserPacket::where(['user_id' => $inviter->user_id])->where(['is_active' => true])->get();
                $inviterCount = (count($inviterPacketId));

                $packetPercentage = $packet->level_percentage;
                $packetPercentage = explode('-', $packetPercentage);

                if ($inviterCount) {
                    $inviterPacketId = collect($inviterPacketId);
                    $inviterPacketId = $inviterPacketId->map(function ($item) {
                        if ($item->packet_id != Packet::LUX) {
                            return $item->packet_id;
                        }
                    });
                    $inviterPacketId = collect($inviterPacketId);
                    $inviterPacketId = $inviterPacketId->filter(function ($value, $key) {
                        return $value != Packet::LUX;
                    });
                    $inviterPacketId = max($inviterPacketId->all());
                    $inviterPacketId = is_array($inviterPacketId) ? 0 : $inviterPacketId;
                    if ($inviterPacketId) {
                        if ($inviter_order == 1 && in_array($inviter->status_id, $actualStatuses)) {
                            $bonusPercentage = (15 / 100);
                            $bonus = $packetPrice * $bonusPercentage;
                        } elseif ($this->hasNeedPackets($packet, $inviterPacketId, $inviter_order)) {
                            $bonusPercentage = ($packetPercentage[$inviter_order - 1] / 100);
                            $bonus = $packetPrice * $bonusPercentage;
                        }
                    }
                }

                if ($bonus) {
                    $operation = new UserOperation();
                    $operation->author_id = $user->user_id;
                    $operation->recipient_id = $inviter->user_id;
                    $operation->money = $bonus;
                    $operation->operation_id = 1;
                    $operation->operation_type_id = 1;
                    $operation->operation_comment = 'Реферальный бонус. "' . $packet->packet_name_ru . '". Уровень - ' . $inviter_order;
                    $operation->save();
                    $inviter->user_money = $inviter->user_money + $bonus;
                    $inviter->save();
                    $this->sentMoney += $bonus;
                }

                $inviter = Users::where(['user_id' => $inviter->recommend_user_id])->first();
                if (!$inviter || $inviter_order >= $packet->packet_available_level) {
                    break;
                }
                $inviter_order++;
            }


            // send pv
            $user->pv_balance = $user->pv_balance + $packet->packet_price;
            $operation = new UserOperation();
            $operation->author_id = $user->user_id;
            $operation->recipient_id = $user->user_id;
            $operation->money = 0;
            $operation->pv_balance = $packet->packet_price;
            $operation->operation_id = 1;
            $operation->operation_type_id = 40;
            $operation->operation_comment = 'Персональный объем от. "' . $packet->packet_name_ru . ' в размере. ' . $packet->packet_price;
            $operation->save();


            $inviter = Users::where(['user_id' => $user->recommend_user_id])->first();
            while ($inviter && in_array($packet->packet_id, Packet::actualPacket())) {
                $operation = new UserOperation();
                $operation->author_id = $user->user_id;
                $operation->recipient_id = $inviter->user_id;
                $operation->money = 0;
                $operation->operation_id = 1;
                $operation->operation_type_id = 11;
                $operation->operation_comment = 'Групповой объем от. "' . $packet->packet_name_ru . ' в размере. ' . $packet->packet_price;
                $operation->gv_balance = $packet->packet_price;
                $operation->save();

                $inviter->gv_balance = $inviter->gv_balance + $packet->packet_price;
                $inviter->save();

                if (in_array($inviter->status_id, [2, 3, 4, 5, 6, 7, 8])) {
                    app(PremiumBonusController::class)->run($inviter->user_id);
                }

                $inviter = Users::where(['user_id' => $inviter->recommend_user_id])->first();
                if (!$inviter) {
                    break;
                }
            }
        }

        $this->qualificationUp($packet, $user);
        $this->implementPacketThings($packet, $user, $userPacket);

    }

    private function activatePackage($userPacket)
    {
        $packet_old_price = 0;

        if ($userPacket == null || $userPacket->is_active == 1) {
            $result['message'] = 'ошибка';
            $result['status'] = false;
            return response()->json($result);
        }

        $packet = Packet::find($userPacket->packet_id);
        $total_packet_price_in_pv = $packet->packet_price - $packet_old_price;
        if ($packet->packet_id == Packet::LUX) {
            $total_packet_price_in_pv = $packet->packet_price;
        }
//        $dollar_price = $total_packet_price_in_pv * (Currency::PVtoKzt / Currency::DollarToKzt);

        $userPacket->is_active = true;
        $userPacket->packet_price = $total_packet_price_in_pv;
        $max_queue_start_position = UserPacket::where('packet_id', $userPacket->packet_id)->where('is_active', 1)->where('queue_start_position', '>', 0)->max('queue_start_position');
        $userPacket->queue_start_position = ($max_queue_start_position) ? ($max_queue_start_position + 1) : 1;
        $userPacket->save();
    }

    private
    function implementPacketThings($packet, $user, $userPacket)
    {
        $company_money = $userPacket->packet_price - $this->sentMoney;
        if ($packet->packet_id == Packet::LUX) {
            $company_money = $company_money * (Currency::PVtoKzt / Currency::DollarToKzt);
        }
        $operation = new UserOperation();
        $operation->author_id = $userPacket->user_id;
        $operation->recipient_id = 1;
        $operation->money = $company_money;
        $operation->operation_id = 1;
        $operation->operation_type_id = 6;
        $operation->operation_comment = 'За покупку пакета "' . $packet->packet_name_ru . '"';
        $operation->save();

        $company = Users::where('user_id', 1)->first();
        $company->user_money = $company->user_money + $company_money;
        $company->save();
    }

    private
    function qualificationUp($packet, $user)
    {
        $actualPackets = [Packet::SMALL, Packet::MEDIUM, Packet::LARGE, Packet::VIP];
        if (in_array($packet->packet_id, $actualPackets)) {

            $operation = new UserOperation();
            $operation->author_id = null;
            $operation->recipient_id = $user->user_id;
            $operation->money = null;
            $operation->operation_id = 1;
            $operation->operation_type_id = 10;

            if ($packet->packet_status_id == UserStatus::CLIENT)
                $operation->operation_comment = 'Ваш статус Клиент';
            elseif ($packet->packet_status_id == UserStatus::CONSULTANT)
                $operation->operation_comment = 'Ваш статус Консультант';
            elseif ($packet->packet_status_id == UserStatus::MANAGER)
                $operation->operation_comment = 'Ваш статус Манаджер';
            elseif ($packet->packet_status_id == UserStatus::DIRECTOR)
                $operation->operation_comment = 'Ваш статус Директор';


            $operation->save();
            $user->status_id = $packet->packet_status_id;
            $user->save();
        }
    }

    public
    function hasNeedPackets($packet, $inviterPacketId, $order)
    {
        $actualPackets = [Packet::SMALL, Packet::MEDIUM, Packet::LARGE, Packet::VIP];
        $boolean = false;
        $inviterPacket = Packet::where(['packet_id' => $inviterPacketId])->first();
        $packet_available_level = $inviterPacket->packet_available_level;
        if (in_array($inviterPacketId, $actualPackets) && $order <= $packet_available_level) {
            $boolean = true;
        }
        return $boolean;
    }

}
