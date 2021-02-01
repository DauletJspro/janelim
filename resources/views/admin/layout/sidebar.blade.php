<ul class="sidebar-menu">
    @if(Auth::user()->status_id > 0)
        <li class="header"
            style="background: #fff; font-size: 14px; padding:5px 25px 0px"> <?php $status_name = \App\Models\UserStatus::where('user_status_id', Auth::user()->status_id)->first(); ?>
            <p style="color:#2e2e2e;margin:0px;font-weight: bold">

                @if(isset($status_name->user_status_name))

                Статус: {{ $status_name->user_status_name }}

                @endif

            </p>
        </li>
    @endif

    <li class="header" style="background: #fff; font-size: 14px; padding:5px 25px 0px">
        <p style="color:#2e2e2e;margin:0px;">Баланс: {{Auth::user()->user_money}}$
            ( {{Auth::user()->user_money * \App\Models\Currency::usdToKzt()}}тг)</p>
    </li>


    <li class="header" style="background: #fff; font-size: 14px; padding:5px 25px 0px">
        @if(Auth::user()->is_activated == 1)
            <p style="color:#2e2e2e;margin:0px;">Аккаунт: активирован</p>
        @else
            <p style="color:#2e2e2e;margin:0px;">Аккаунт: не активирован</p>
        @endif
    </li>
    <li class="header" style="background: #fff; font-size: 14px; padding:5px 25px 5px">
        @if(Auth::user()->is_valid_document == 1)
            <p style="color:#2e2e2e;margin:0px;">Верификация: Пройдено</p>
        @else
            <p style="color:#2e2e2e;margin:0px;text-decoration: underline; padding: 0px; cursor: pointer" onclick="location.href='/admin/document'">Верификация:
            Не пройдено
            </p>
        @endif
    </li>

    <li class="treeview" style="background-color: #009551;">
        <a href="/admin/call-friend" style="color: black" class="balance-btn">
            <i class="fa fa-reply-all"></i>
            <span style="color: black">Реферальная ссылка</span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/index">
            <i class="fa fa-user"></i>
            <span>Главная</span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/profile">
            <i class="fa fa-user"></i>
            <span>Профиль</span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/our-document">
            <i class="fa fa-user"></i>
            <span>Договор</span>
        </a>
    </li>

    {{--    <li class="treeview balance-btn" style="background-color: #F9BF3B;">--}}
    {{--        <a href="/admin/balance" style="color: black" class="balance-btn">--}}
    {{--            <i class="fa fa-money"></i>--}}
    {{--            <span>Пополнить баланс</span>--}}
    {{--        </a>--}}
    {{--        <style>--}}
    {{--            .balance-btn:hover {--}}
    {{--                background-color: #F9BF3B !important;--}}
    {{--            }--}}
    {{--        </style>--}}
    {{--    </li>--}}
    {{--    <li class="treeview">--}}
    {{--        <a href="/admin/document">--}}
    {{--            <i class="fa fa-user"></i>--}}
    {{--            <span>Мои документы</span>--}}
    {{--        </a>--}}
    {{--    </li>--}}
    {{--    <li class="treeview">--}}
    {{--        <a href="/admin/instagram">--}}
    {{--            <i class="fa fa-user"></i>--}}
    {{--            <span>Мои подписки</span>--}}
    {{--        </a>--}}
    {{--    </li>--}}

    <li class="treeview">
        <a href="/admin/presentation">
            <i class="fa fa-shopping-cart"></i>
            <span>Презентация</span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/shop">
            <i class="fa fa-shopping-cart"></i>
            <span>Бизнес пакеты </span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/online"  style="pointer-events: none;">
            <i class="fa fa-shopping-cart"></i>
            <span>Интернет магазин</span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/online/history">
            <i class="fa fa-user"></i>
            <span>Мои покупки</span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/request/send">
            <i class="fa fa-money"></i>
            <span>Снятие денег</span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/request/send-account">
            <i class="fa fa-money"></i>
            <span>Отправить деньги</span>
        </a>
    </li>

    {{-- <li class="treeview">
        <a href="/admin/instagram/partners/request">
            <i class="fa fa-user"></i>
            <span>Мои подписчики</span>
        </a>
    </li>

    @if(Auth::user()->role_id == 1)

{{--        <li class="treeview">--}}
{{--            <a href="/admin/group">--}}
{{--                <i class="fa fa-user"></i>--}}
{{--                <span>Фонды</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--    @endif--}}

    @if(Auth::user()->role_id == 1)

        <li class="treeview">
            <a href="/admin/packet/user/active">
                <i class="fa fa-list-ul"></i>
                <span>Статистика</span>
            </a>
        </li>

        <li class="treeview">
            <a href="/admin/packet/user/inactive">
                <i class="fa fa-list-ul"></i>
                <span>Запросы на пакет</span>
                <?php $user_packet_notice = \App\Models\UserPacket::where('is_active', '0')->count();?>
                <span class="label label-primary pull-right" id="inactive_user_packet_count"
                      style="@if($user_packet_notice == 0) display: none; @endif background-color: rgb(253, 58, 53) ! important;">{{$user_packet_notice}}</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i>
                <?php $user_packet_notice = \App\Models\UserRequest::where('is_accept', '0')->count();?>
                <span>Запросы на снятие</span> <i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right" id="inactive_user_request_count"
                      style="@if($user_packet_notice == 0) display: none; @endif background-color: rgb(253, 58, 53) ! important;">{{$user_packet_notice}}</span>
            </a>
            <ul class="treeview-menu">
                <li class="treeview">
                    <a href="/admin/request">
                        <i class="fa fa-list-ul"></i>
                        <span>Входяшие запросы</span>
                        <span class="label label-primary pull-right" id="inactive_user_request_count"
                              style="@if($user_packet_notice == 0) display: none; @endif background-color: rgb(253, 58, 53) ! important;">{{$user_packet_notice}}</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="/admin/request/accept">
                        <i class="fa fa-list-ul"></i>
                        <span>Принятые запросы</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="/admin/request/delete">
                        <i class="fa fa-list-ul"></i>
                        <span>Удаленные запросы</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="treeview">
            <a href="/admin/client">
                <i class="fa fa-users"></i>
                <span>Пользователи</span>
            </a>
        </li>
        <li class="treeview">
            <a href="/admin/packet-item">
                <i class="fa fa-list"></i>
                <span>Пакеты</span>
            </a>
        </li>
        <li class="treeview">
            <a href="/admin/product">
                <i class="fa fa-list"></i>
                <span>Товары</span>
            </a>
        </li>
        <li class="treeview">
            <a href="/admin/accounting">
                <i class="fa fa-money"></i>
                <span>Учет</span>
            </a>
        </li>
        <li>
            <a href="/admin/representative">
                <i class="fa fa-user"></i>
                <span>Добавить представителей</span>
            </a>
        </li>
        <li class="treeview">
            <a href="/admin/faq">
                <i class="fa fa-question"></i>
                <span>Часта задаваемые вопросы</span>
            </a>
        </li>
{{--    @endif--}}
    {{-- <li class="treeview">
         <a href="/admin/binar/config">
             <i class="fa fa-sitemap"></i>
             <span>Настройка авторегистрации</span>
         </a>
     </li>--}}
    {{--@if(Auth::user()->role_id == 1)
        <li class="treeview">
            <a href="/admin/shareholder">
                <i class="fa fa-users"></i>
                <span>Дольщики</span>
            </a>
        </li>
            <li class="treeview">
                <a href="/admin/shareholder2">
                    <i class="fa fa-users"></i>
                    <span>Дольщики по статусу</span>
                </a>
            </li>
    @endif--}}
    @endif
    <li class="treeview">
        <a href="/admin/operation">
            <i class="fa fa-list-ul"></i>
            <span>Счет</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/structure">
            <i class="fa fa-sitemap"></i>
            <span>Структура</span>
        </a>
    </li>
{{--    <li class="treeview">--}}
{{--        <a href="/admin/online">--}}
{{--            <i class="fa fa-shopping-cart"></i>--}}
{{--            <span>Интернет магазин</span>--}}
{{--        </a>--}}
{{--    </li>--}}
    <li class="treeview">
        <a href="/admin/request/send">
            <i class="fa fa-money"></i>
            <span>Снятие денег</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/admin/request/send-account">
            <i class="fa fa-money"></i>
            <span>Отправить деньги</span>
        </a>
    </li>

    <li class="treeview">
        <a href="/admin/password">
            <i class="fa fa-key"></i>
            <span>Сменить пароль</span>
        </a>
    </li>


    <li class="treeview">
        <a href="/logout">
            <i class="fa fa-sign-out"></i>
            <span>Выйти</span>
        </a>
    </li>

</ul>