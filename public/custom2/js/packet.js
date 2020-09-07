function closeModal() {
    $('.modal-dialog').css('display', 'none');    
    $('#blur').css('display', 'none');
}

function writeMessage() {
    $.ajax({
        url: '/contact',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            user_name: $('#user_name').val(),
            email: $('#user_email').val(),
            message: $('#message').val()
        },
        success: function (data) {
            if (data.status == false) {
                showError(data.message);
                return;
            }
            else {
                $('#message').val('');
                showMessage(data.message);
            }
        }
    });
}
function showError(message){
    $.gritter.add({
        title: '',
        text: message
    });
    return false;
}

function showMessage(message){
    $.gritter.add({
        title: '',
        text: message,
        class_name: 'success-gritter'
    });
    return false;
}



function addResponseAddPacket(ob,packet_id,user_packet_type){
    if(confirm('Действительно хотите отправить запрос?')) {
        document.getElementById('ajax-loader').style.display='block';
        $.ajax({
            url: '/admin/packet/user',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                packet_id: packet_id,
                user_packet_type: user_packet_type
            },
            success: function (data) {
                document.getElementById('ajax-loader').style.display='none';
                if (data.status == false) {
                    showError(data.message);
                    return;
                }
                else {                    
                    $(ob).html('Отправили запрос');
                    $(ob).attr('href','#');
                    $(ob).attr('onclick','');

                    $(ob).html('Отменить запрос <i class="fa fa-arrow-circle-right"></i>');
                    $(ob).attr('href','javascript:void(0)');
                    $(ob).attr('onclick','cancelResponsePacket(this,' + packet_id + ')');
                    closeModal();
                    showMessage(data.message);
                }
            }
        });
    }
}

function buyPacketFromBalance(ob,packet_id,user_packet_type){
    if(confirm('Действительно хотите купить?')) {
        document.getElementById('ajax-loader').style.display='block';
        $.ajax({
            url: '/admin/packet/user/balance',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                packet_id: packet_id,
                user_packet_type: user_packet_type
            },
            success: function (data) {
                document.getElementById('ajax-loader').style.display='none';
                if (data.status == false) {
                    console.log(data)
                    showError(data.message);
                    return;
                }
                else {
                    $('.shop_buy_btn').remove('');
                    closeModal();
                    showMessage(data.message);
                    setTimeout(function(){ location.reload(); }, 1000);
                }
            }
        });
    }
}

function acceptUserPacket(ob,packet_id){
    if(confirm('Действительно хотите принять запрос?')) {
        document.getElementById('ajax-loader').style.display='block';
        $.ajax({
            url: '/admin/packet/user/inactive',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                packet_id: packet_id
            },
            success: function (data) {
                document.getElementById('ajax-loader').style.display='none';
                if (data.status == false) {
                    showError(data.message);
                    return;
                }
                else {
                    $(ob).html('Принято');
                    $(ob).removeClass('btn-success');
                    $(ob).addClass('btn-info');
                    $(ob).attr('onclick','');
                    closeModal();
                    showMessage(data.message);
                }
            }
        });
    }
}

function deleteUserPacket(ob,packet_id){
    if(confirm('Действительно хотите удалить запрос?')) {
        document.getElementById('ajax-loader').style.display='block';
        $.ajax({
            url: '/admin/packet/user/inactive',
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                packet_id: packet_id
            },
            success: function (data) {
                document.getElementById('ajax-loader').style.display='none';
                if (data.status == false) {
                    showError(data.message);
                    return;
                }
                $(ob).closest('tr').remove();
            }
        });
    }
}

function opUl(t){
    var ultag = t.parentNode.getElementsByTagName('UL')[0].style;
    if(ultag.display != 'block'){
        ultag.display = 'block';
        t.innerHTML = '-';
    }
    else{
        t.innerHTML = '+';
        ultag.display = 'none';
    }
}

function copyLink() {
    window.prompt("Нажмите: Ctrl+C и enter", $('#url_link').val());
}

function getChildAjax(t,user_id,level){
    $.ajax({
        url: '/admin/structure/child/' + user_id + '/' + level,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data.status == false) {
                showError(data.message);
                return;
            }
            else {
                $(t).closest('.parent').find('.child-list').html(data);
                var ultag = t.parentNode.getElementsByTagName('UL')[0].style;
                if(ultag.display != 'block'){
                    ultag.display = 'block';
                    t.innerHTML = '-';
                }
                else{
                    t.innerHTML = '+';
                    ultag.display = 'none';
                }
            }
        }
    });
}

function acceptUserRequest(ob,user_request_id){
    if(confirm('Действительно хотите принять запрос?')) {
        document.getElementById('ajax-loader').style.display='block';
        $.ajax({
            url: '/admin/request/inactive',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                user_request_id: user_request_id
            },
            success: function (data) {
                document.getElementById('ajax-loader').style.display='none';
                if (data.status == false) {
                    showError(data.message);
                    return;
                }
                else {
                    $(ob).html('Принято');
                    $(ob).removeClass('btn-success');
                    $(ob).addClass('btn-info');
                    $(ob).attr('onclick','');
                    showMessage(data.message);
                }
            }
        });
    }
}

function deleteUserRequest(ob,user_request_id){
    if(confirm('Действительно хотите удалить запрос?')) {
        document.getElementById('ajax-loader').style.display='block';
        $.ajax({
            url: '/admin/request/inactive',
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                user_request_id: user_request_id
            },
            success: function (data) {
                document.getElementById('ajax-loader').style.display='none';
                if (data.status == false) {
                    showError(data.message);
                    return;
                }
                $(ob).closest('tr').remove();
            }
        });
    }
}

function addResponseAddRequest(ob){
    if(confirm('Действительно хотите отправить запрос?')) {
        document.getElementById('ajax-loader').style.display='block';
        $.ajax({
            url: '/admin/request',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                money: $('#money').val(),
                comment: $('#comment').val()
            },
            success: function (data) {
                document.getElementById('ajax-loader').style.display='none';
                if (data.status == false) {
                    showError(data.message);
                    return;
                }
                else {
                    $('#comment').val('');
                    $('#money').val('');
                    showMessage(data.message);
                }
            }
        });
    }
}

function getCityListByCountry(ob) {
    $('#city_id').html('');
    $.get('/city?country_id=' + ob.value, function(data){
        var select = $('#city_id');
        $(select).html('<option value="">Выберите город</option>');
        $(data.data).each(function(){
            $(select).append('<option value="' + this.city_id + '">' + this.city_name +'</option>');
        });
    });
}

function getCityListByCountry2(ob) {
    $('#fact_city_id').html('');
    $.get('/city?country_id=' + ob.value, function(data){
        var select = $('#fact_city_id');
        $(select).html('<option value="">Выберите город</option>');
        $(data.data).each(function(){
            $(select).append('<option value="' + this.city_id + '">' + this.city_name +'</option>');
        });
    });
}

function changeMoney(percent) {
    money = $('#money').val();
    money_nalog = $('#money').val() * percent;
    $('#money_label').html(money_nalog + ' $');
}

function cancelResponsePacket(ob,packet_id){
    if(confirm('Действительно хотите отменить свой запрос?')) {
        document.getElementById('ajax-loader').style.display='block';
        $.ajax({
            url: '/admin/packet/user',
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                packet_id: packet_id
            },
            success: function (data) {
                document.getElementById('ajax-loader').style.display='none';
                if (data.status == false) {
                    showError(data.message);
                    return;
                }
                else {
                    $(ob).html('Купить пакет <i class="fa fa-arrow-circle-right"></i>');
                    $(ob).attr('href','javascript:void(0)');
                    $(ob).attr('onclick','showBuyModal(' + packet_id + ')');

                    showMessage(data.message);
                    location.reload();
                }
            }
        });
    }
}

function showBuyModal(ob,id) {
    $('#buy_btn').attr('onclick','redirectPaybox("' + $(ob).closest('.packet-item-list').find('.packet_type').val() + '",' + id + ')');
    $('#send_request_btn').attr('onclick','addResponseAddPacket($(".buy_btn_' + id + '"),' + id + ',"' + $(ob).closest('.packet-item-list').find('.packet_type').val() + '")');
    $('#buy_packet_from_balance_btn').attr('onclick','buyPacketFromBalance($(".buy_btn_' + id + '"),' + id + ',"' + $(ob).closest('.packet-item-list').find('.packet_type').val() + '")');
    $('#buy_modal').modal();
}

function redirectPaybox(user_packet_type,id) {
    if(confirm('Действительно хотите купить пакет онлайн?')) {
        $.ajax({
            type: 'get',
            url: "/admin/packet/paybox",
            data: {
                packet_id: id,
                user_packet_type: user_packet_type
            },
            success: function(data){
                if(data.status == false){
                    showError(data.message);
                }
                else window.location.href = "https://www.paybox.kz/payment.php?" + data.href;
            }
        });
    }
}