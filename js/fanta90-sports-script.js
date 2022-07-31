function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
jQuery(document).ready(function($){
    $(".fs-tabs-list li a").click(function(e){
        e.preventDefault();
    });
    
    $(".fs-tabs-list li").click(function(){
        var tabid = $(this).find("a").attr("href");
        $(".fs-tabs-list li,.fs-tabs div.fs-tab").removeClass("active");   // removing active class from tab
    
        var role_s = $('#srch_by option[value="2"]');
        tabid=='#tab1'?role_s.show():role_s.hide();

        $(".fs-tab").hide();   // hiding open tab
        $(tabid).show();    // show tab
        $(this).addClass("active"); //  adding active class to clicked tab

        $('.snf-sec').addClass('fs-hidden');
        $('.snf-inp').val('');              // reset search bar
        var table_id = $('.srch-btn').attr('data-table-id');
        $('#'+table_id).find('tr').css("display", "");

        // header positioning
        $('.tab-sec-header').css('top', '66px');
        $('.fs-table-head').css('top', '136px')
        $('.fs-data-table').scrollTop(0);
    });

    var scroll=0;
    $('.fs-data-table').scroll(function (event) {
        scroll = $(this).scrollTop();
        // Do something
        if($('.snf-sec').hasClass('fs-hidden')){
            $('.tab-sec-header').css('top', '66px');
            $('.fs-table-head').css('top', '136px')
        }else{
            $('.tab-sec-header').css('top', '135px');
            $('.fs-table-head').css('top', '206px')
        }
    });
    $('.srch-btn').on('click', function(){
        if(scroll>0){
            $('.tab-sec-header').css('top', '135px');
            $('.fs-table-head').css('top', '206px')
        }else{
            $('.tab-sec-header').css('top', '66px');
            $('.fs-table-head').css('top', '136px')
        }
        $('.snf-sec').toggleClass('fs-hidden');
        var table_id = $(this).attr('data-table-id');
        $('#snf_search').attr('data-table-id', table_id);
        $('#snf_clear').attr('data-table-id', table_id);
    })

    $('#srch_by').on('input', function(){
        if($(this).val()=='4'){
            $('.quote-search').removeClass('fs-hidden');
            $('#search_inp').addClass('fs-hidden');
        }else{
            $('.quote-search').addClass('fs-hidden');
            $('#m_search_inp').removeClass('fs-hidden');
        }   
    })

    $('#snf_search').on('click', function(){
        var table_id = $(this).attr('data-table-id');
        var col_num = $('#srch_by').val();
        filter_table_data('search_inp', table_id, col_num);
        
        if(col_num=='4'){
            quoteFilter('min', 'max', table_id, col_num)
        }
        
    });
    $('#snf_clear').on('click', function(){
        var table_id = $(this).attr('data-table-id');
        $('.snf-inp').val('');
        $('#'+table_id).find('tr').css("display", "");
    });

    function credit(){
        var addition = 0;
        var cred= 150;
        $('#all_table .add-btn.add-act').each(function(){
            var qt = +$(this).data().quote;
            addition += qt;
        });
        var t_credit = cred - addition;
        $('.credit_id').text(t_credit);
        t_credit<=0? $('.credit_id').css('color', 'tomato'): $('.credit_id').css('color', 'initial');
    }

    var p_module, defen_m, midfi_m, forwa_m;
    p_module = defen_m = midfi_m = forwa_m = 0;
    $('.tm-module').on('input', function(){
        var p_module = $('.tm-module:checked').attr('id');
        defen_m = +p_module.split('-')[0];
        midfi_m = +p_module.split('-')[1];
        forwa_m = +p_module.split('-')[2];

        var dl= $('.fs-f-D').children().length;
        var ml= $('.fs-f-C').children().length;
        var fl= $('.fs-f-A').children().length;
        
        var d = defen_m+1;
        var m = midfi_m+1;
        var f = forwa_m+1;
        
        // var del_fq=del_mq=del_dq=0;
        $('.fs-f-D .fsf-p-c:nth-child(n+'+d+')').each(function(){
            var t_id = this.id;
            $(`.add-btn[data-del='${t_id}']`).removeClass('add-act').attr('disabled', true);
            
            // var del_q=$(`.add-btn[data-del='${t_id}']`).data('quote');
            // del_dq+=del_q
            $(`.add-btn[data-del='${t_id}']`).addClass('del_btn');
        })
        $('.fs-f-C .fsf-p-c:nth-child(n+'+m+')').each(function(){
            var t_id = this.id;
            $(`.add-btn[data-del='${t_id}']`).removeClass('add-act').attr('disabled', true);
            
            // var del_q=$(`.add-btn[data-del='${t_id}']`).data('quote');
            // del_mq+=del_q
            $(`.add-btn[data-del='${t_id}']`).addClass('del_btn');
        })
        $('.fs-f-A .fsf-p-c:nth-child(n+'+f+')').each(function(){
            var t_id = this.id;
            $(`.add-btn[data-del='${t_id}']`).removeClass('add-act').attr('disabled', true);
            
            // var del_q=$(`.add-btn[data-del='${t_id}']`).data('quote');
            // del_fq+=del_q
            $(`.add-btn[data-del='${t_id}']`).addClass('del_btn');
        })
        
        // var credit = +$('.credit_id').first().text();
        // var rem_credit = credit + (del_fq+del_mq+del_dq);
        // $('.credit_id').text(rem_credit);
        credit();
        // rem_credit<=0? $('.credit_id').css('color', 'tomato'): $('.credit_id').css('color', 'initial');

        dl>defen_m? $('.fs-f-D .fsf-p-c:nth-child(n+'+d+')').remove():'';
        ml>midfi_m? $('.fs-f-C .fsf-p-c:nth-child(n+'+m+')').remove():'';
        fl>forwa_m? $('.fs-f-A .fsf-p-c:nth-child(n+'+f+')').remove():'';
    })
    
    var clk = 0;
    $('.add-btn').on('click', function(e){
        // var qt = 0;
        e.preventDefault();
        // var quote = +$(this).attr('data-quote');
        var data_id = $(this).attr('data-id');
        var btn_id = $(`.add-btn[data-id='${data_id}']`);
        btn_id.toggleClass('add-act');

        // qt = btn_id.hasClass('add-act')? qt+quote : qt-quote;
        // qt==0? $('.credit-lbl').text('Total Credit'): $('.credit-lbl').text('Remaining');
        
        // var credit = +$('.credit_id').first().text();
        // console.log(credit, qt)
        // re_credit = credit-qt;
        // $('.credit_id').text(re_credit);
        // re_credit<=0? $('.credit_id').css('color', 'tomato'): $('.credit_id').css('color', 'initial');
        
        credit();



        // add and remove players in soccer field
        clk++;
        if($(this).hasClass('add-act')){
            var b_role = $(this).data('role');
            var b_id = clk;
            var p_id =  b_role + b_id;
            var r_n = $(this).data('role').charAt(0);
            var p_n = $(this).data('name');
            var clr = r_n=='A'?'fsf-plyr-a':r_n=='C'?'fsf-plyr-c':r_n=='D'?'fsf-plyr-d':r_n=='P'?'fsf-plyr-p':'';
            var fp = `
                <div class="fsf-p-c fsf-plyr" id="${p_id}">
                    <div class="fsf-player ${clr}">${r_n}</div>
                    <div class="fsf-p-de">${p_n}</div>
                </div>
            `;
            $('.fs-f-'+p_id.charAt(0)).append(fp);
            $(btn_id).attr('data-del', p_id);
        }else{
            var del = $(this).attr('data-del');
            $('#'+del).remove();
        }
    })

    // remove player button
    $(document).on('click', '.fsf-plyr', function(){
        var t_id = this.id;
        $('#'+t_id).remove();
        $(`.add-btn[data-del="${t_id}"]`).removeClass('add-act');
        console.log()
        var del_rol = $(`.add-btn[data-del="${t_id}"]`).data().role;
        $(`.add-btn[data-role="${del_rol}"]`).attr('disabled', false);
        // var quote = +$(`.add-btn[data-del="${t_id}"]`).data('quote');
        // var credit = +$('.credit_id').first().text();
        // var reset = quote+credit;
        // $('.credit_id').text(reset);
        // reset<=0? $('.credit_id').css('color', 'tomato'): $('.credit_id').css('color', 'initial');
        
        credit(); 
    })

    // btn validation
    $('.tm-module, .add-btn').on('click', function(){
        var p_module = $('.tm-module:checked').attr('id');
        var defen_m = +p_module.split('-')[0];
        var midfi_m = +p_module.split('-')[1];
        var forwa_m = +p_module.split('-')[2];
        // console.log(defen_m, midfi_m, forwa_m)

        var defend = $(".add-btn[data-role='D']");
        var midfie = $(".add-btn[data-role='C']");
        var forwar = $(".add-btn[data-role='A']");
        var goalke = $(".add-btn[data-role='P']");
        
        var defend_lng = $(".add-act[data-role='D']").length;
        var midfie_lng = $(".add-act[data-role='C']").length;
        var forwar_lng = $(".add-act[data-role='A']").length;
        var goalke_lng = $(".add-act[data-role='P']").length;

        defend_lng>=defen_m*2? defend.not('.add-act').attr('disabled', true): defend.attr('disabled', false); 
        midfie_lng>=midfi_m*2? midfie.not('.add-act').attr('disabled', true): midfie.attr('disabled', false); 
        forwar_lng>=forwa_m*2? forwar.not('.add-act').attr('disabled', true): forwar.attr('disabled', false); 
        goalke_lng>=1? goalke.not('.add-act').attr('disabled', true): goalke.attr('disabled', false); 

    })
    $('#3-5-2').trigger('input');

    // popup-form
    $(document).on('click', '.add_forward', function(){
        var thisId = $(this).attr('data-form');
        
        $('#'+thisId).parent().fadeIn('fast');
        $('#'+thisId).fadeIn('fast');
        $('body').css('overflow', 'hidden');

        var abc = $(this).children('.fsf-mp-de').text();
        var prevRows = $('.m-tbody').find(`.m-list-radio[data-name="${abc}"]:checked`).parent().parent().prevAll().length;
        var s_height = window.innerHeight;
        var position = prevRows * 49.5 - (s_height/2);

        $('.crm-form-reveal-overlay').scrollTop(position)
        // $('.fs-player-field img').css('display', 'none');
        $('.footer-widgets__inner').css('display', 'none');
    });
    $(document).on('click input', '.close-button, .m-list-radio, .m-add-btn', function(){
        var thisId = $(this).attr('data-form');
        $('#'+thisId).fadeOut('fast');
        $('#'+thisId).parent().fadeOut('fast');
        $('body').css('overflow', 'auto');

        $('.snfm-sec').addClass('fs-hidden');
        $(".snf-inp").val('');
        $('.fs-m-table-head').css('top', '66px');
        $('.table-row').css('display', ''); 
        // $('.fs-player-field img').css('display', 'block');   
        $('.footer-widgets__inner').css('display', 'block');   
    });

    // mobile version
    $('.fsf-mp-c').on('click', function(){
        var t_id = this.id;
        var add_id = $(this).data('table');

        $('.m-tbody').hide();
        $('.m-'+add_id).show();
        
        $('.srch-btn').hide();
        $('.ms-'+add_id).show();
        
        $('.m-list-radio').data('pid', t_id);
        $(`.mf-ad-btn`).hide();
        $(`.mf-ad-btn[data-fpid="${t_id}"]`).show();
        $(`.mf-ad-btn[data-mpid="${t_id}"]`).show();
        $(`.mf-ad-btn[data-dpid="${t_id}"]`).show();
        $(`.mf-ad-btn[data-mpg="${t_id}"]`).show();

    })

    $('.m-list-radio').on('input', function(){
        var name = $(this).data('name');
        var role = $(this).data('role').charAt(0);
        var quote = $(this).data('quote');
        var clr = role=='A'?'fsf-plyr-a':role=='C'?'fsf-plyr-c':role=='D'?'fsf-plyr-d':role=='P'?'fsf-plyr-p':'';
        
        var data_pid = $(this).data('pid');
        $('.'+data_pid).children('.fsf-m-player').addClass(`fsf-m-p-active ${clr}`);
        $('.'+data_pid).children('.fsf-m-player').text(role);
        $('.'+data_pid).children('.fsf-m-player').data('quote', quote);
        $('.'+data_pid).children('.fsf-mp-de').text(name);
    })

    $('.tm-module').on('input', function(){
        var p_module = $('.tm-module:checked').attr('id');
        defen_m = +p_module.split('-')[0];
        midfi_m = +p_module.split('-')[1];
        forwa_m = +p_module.split('-')[2];

        $('.fs-mf-A').hide()
        $('.fs-mf-C').hide()
        $('.fs-mf-D').hide()
        
        $('.fs-mf-A'+forwa_m).show();
        $('.fs-mf-C'+midfi_m).show();
        $('.fs-mf-D'+defen_m).show();
        // //////////////////////////////
        $('.m-list-radio').prop('checked', false);  
        $('.m-list-radio').prop('disabled', false);
        $('.m-add-btn').text('+');

        $('.fsf-m-player').removeClass(`fsf-m-p-active`);
        $('.fsf-m-player').text('+');
        $('.fsf-mp-de').text('');

        $('#m_credit').text(150);
        $('#m_credit').css('color', 'initial');
    }).trigger('input');

    $('.m-list-radio').on('input', function(e){
        var fo1= $('input[name="fo1"]:checked');
        var fo2= $('input[name="fo2"]:checked');
        var fo3= $('input[name="fo3"]:checked');
        var mi1= $('input[name="mid1"]:checked');
        var mi2= $('input[name="mid2"]:checked');
        var mi3= $('input[name="mid3"]:checked');
        var mi4= $('input[name="mid4"]:checked');
        var mi5= $('input[name="mid5"]:checked');
        var de1= $('input[name="mpd1"]:checked');
        var de2= $('input[name="mpd2"]:checked');
        var de3= $('input[name="mpd3"]:checked');
        var de4= $('input[name="mpd4"]:checked');
        var de5= $('input[name="mpd5"]:checked');
        var gok= $('input[name="goal1"]:checked');
        
        $('input[name="fo1"]:not(:checked)').attr('disabled', false);
        $('input[name="fo2"]:not(:checked)').attr('disabled', false);
        $('input[name="fo3"]:not(:checked)').attr('disabled', false);
        $('input[name="mid1"]:not(:checked)').attr('disabled', false);
        $('input[name="mid2"]:not(:checked)').attr('disabled', false);
        $('input[name="mid3"]:not(:checked)').attr('disabled', false);
        $('input[name="mid4"]:not(:checked)').attr('disabled', false);
        $('input[name="mid5"]:not(:checked)').attr('disabled', false);
        $('input[name="mpd1"]:not(:checked)').attr('disabled', false);
        $('input[name="mpd2"]:not(:checked)').attr('disabled', false);
        $('input[name="mpd3"]:not(:checked)').attr('disabled', false);
        $('input[name="mpd4"]:not(:checked)').attr('disabled', false);
        $('input[name="mpd5"]:not(:checked)').attr('disabled', false);
        $('input[name="goal1"]:not(:checked)').attr('disabled', false);
        
        $(`.m-list-radio[data-id=${fo1.data('id')}]`).not(fo1).attr('disabled', true);
        $(`.m-list-radio[data-id=${fo2.data('id')}]`).not(fo2).attr('disabled', true);
        $(`.m-list-radio[data-id=${fo3.data('id')}]`).not(fo3).attr('disabled', true);
        $(`.m-list-radio[data-id=${mi1.data('id')}]`).not(mi1).attr('disabled', true);
        $(`.m-list-radio[data-id=${mi2.data('id')}]`).not(mi2).attr('disabled', true);
        $(`.m-list-radio[data-id=${mi3.data('id')}]`).not(mi3).attr('disabled', true);
        $(`.m-list-radio[data-id=${mi4.data('id')}]`).not(mi4).attr('disabled', true);
        $(`.m-list-radio[data-id=${mi5.data('id')}]`).not(mi5).attr('disabled', true);
        $(`.m-list-radio[data-id=${de1.data('id')}]`).not(de1).attr('disabled', true);
        $(`.m-list-radio[data-id=${de2.data('id')}]`).not(de2).attr('disabled', true);
        $(`.m-list-radio[data-id=${de3.data('id')}]`).not(de3).attr('disabled', true);
        $(`.m-list-radio[data-id=${de4.data('id')}]`).not(de4).attr('disabled', true);
        $(`.m-list-radio[data-id=${de5.data('id')}]`).not(de5).attr('disabled', true);
        $(`.m-list-radio[data-id=${gok.data('id')}]`).not(gok).attr('disabled', true);
        
        // console.log(fo2.data('quote'));
        fo2_q = +fo2.data('quote')? +fo2.data('quote'):0;
        fo1_q = +fo1.data('quote')? +fo1.data('quote'):0;
        fo3_q = +fo3.data('quote')? +fo3.data('quote'):0;
        mi1_q = +mi1.data('quote')? +mi1.data('quote'):0;
        mi2_q = +mi2.data('quote')? +mi2.data('quote'):0;
        mi3_q = +mi3.data('quote')? +mi3.data('quote'):0;
        mi4_q = +mi4.data('quote')? +mi4.data('quote'):0;
        mi5_q = +mi5.data('quote')? +mi5.data('quote'):0;
        de1_q = +de1.data('quote')? +de1.data('quote'):0;
        de2_q = +de2.data('quote')? +de2.data('quote'):0;
        de3_q = +de3.data('quote')? +de3.data('quote'):0;
        de4_q = +de4.data('quote')? +de4.data('quote'):0;
        de5_q = +de5.data('quote')? +de5.data('quote'):0;        
        gok_q = +gok.data('quote')? +gok.data('quote'):0;

        var fq_sum = fo1_q + fo2_q + fo3_q;
        var mq_sum = mi1_q + mi2_q + mi3_q + mi4_q + mi5_q;
        var dq_sum = de1_q + de2_q + de3_q + de4_q + de5_q;
        var gq_sum = gok_q;

        var sum_q = fq_sum + mq_sum + dq_sum + gq_sum;
        var m_credit = 150-sum_q;
        $('.credit_id').text(m_credit);
        sum_q==0? $('.credit-lbl').text('Total Credit'): $('.credit-lbl').text('Remaining');
        m_credit<=0? $('.credit_id').css('color', 'tomato'): $('.credit_id').css('color', 'initial');
    })
    
    $('.m-add-btn').on('click', function(){
        var inp_n = $(this).attr('for');
        if($(`#${inp_n}`).is(':checked')){
            $(this).attr('for', '');
            $(`#${inp_n}`).prop('checked', false);

            var credit= +$("#m_credit").text();
            var del_cr = $(this).data('quote');
            var rem_cr = credit+del_cr;
            $("#m_credit").text(rem_cr);

            var this_id=$(this).data('id');
            $(`.m-list-radio[data-id=${this_id}]`).not(this).attr('disabled', false);
            
            var data_pid = $(`#${inp_n}`).data('pid');
            $('.'+data_pid).children('.fsf-m-player').removeClass(`fsf-m-p-active`);
            $('.'+data_pid).children('.fsf-m-player').text('+');
            $('.'+data_pid).children('.fsf-mp-de').text('');
            
            $('.crm-form-reveal-overlay').hide();
            $(this).text('+')

            rem_cr==150? $('.credit-lbl').text('Total Credit'): $('.credit-lbl').text('Remaining');
            rem_cr<=0? $('.credit_id').css('color', 'tomato'): $('.credit_id').css('color', 'initial');
        }else{
            var this_for = $(this).data('for');
            $(this).attr('for', this_for);
            
            var name = $(this).data('name');
            $(`.m-add-btn[data-name="${name}"]`).text('+')
            $(this).text('-')

            // var rad_id =$(`.m-list-radio:disabled`).attr('id');
            // $(`.m-add-btn[for="${rad_id}"]`).text('+')
        }
    })

    var scroll=0;
    $('.crm-form-reveal-overlay').scroll(function(){
        scroll = $(this).scrollTop();
        if($('.snfm-sec').hasClass('fs-hidden')){
            $('.fs-m-table-head').css('top', '66px');
        }else{
            $('.fs-m-table-head').css('top', '162px');
        }
    });
    $('.srch-btn').on('click', function(){
        if(scroll>0){
            $('.fs-m-table-head').css('top', '162px');
        }else{
            $('.fs-m-table-head').css('top', '66px');
        }

        $('.snfm-sec').toggleClass('fs-hidden');
        $('.quote-search').addClass('fs-hidden');
        $('#m_search_inp').removeClass('fs-hidden');
        var table_id = $(this).attr('data-table-id');
        $('#snfm_search').attr('data-table-id', table_id);
        $('#snfm_clear').attr('data-table-id', table_id);
    })

    $('#snfm_search').on('click', function(){
        var table_id = $(this).attr('data-table-id');
        var col_num = $('#m_srch_by').val();
        filter_table_data('m_search_inp', table_id, col_num);
        
        if(col_num=='3'){
            quoteFilter('m_min', 'm_max', table_id, col_num)
        }   
        
    });
    $('#snfm_clear').on('click', function(){
        var table_id = $(this).attr('data-table-id');
        $('.snf-inp').val('');
        $('#'+table_id).find('tr').css("display", "");
    });

    $('#m_srch_by').on('input', function(){
        if($(this).val()=='3'){
            $('.quote-search').removeClass('fs-hidden');
            $('#m_search_inp').addClass('fs-hidden');
        }else{
            $('.quote-search').addClass('fs-hidden');
            $('#m_search_inp').removeClass('fs-hidden');
        }
    })

    function tableSort(tbl_i){
        var properties = ['id_h', 'name_h', 'role_h', 'club_h', 'quote_h'];
        $.each(properties, function (i, val) {
            var orderClass = "";
            $("#" + val + tbl_i).click(function (e) {
                e.preventDefault();
                console.log(this)
                // $(".filter__link.filter__link--active")
                $(".filter__link"+tbl_i+".filter__link--active"+tbl_i)
                    .not(this)
                    .removeClass("filter__link--active"+tbl_i);
                $(this).toggleClass("filter__link--active"+tbl_i);
                $(".filter__link"+tbl_i).removeClass("asc desc");
    
                if (orderClass == "desc" || orderClass == "") {
                    $(this).addClass("asc");
                    orderClass = "asc";
                } else {
                    $(this).addClass("desc");
                    orderClass = "desc";
                }
    
                var parent = $(this).closest(".header__item"+tbl_i);
                var index = $(".header__item"+tbl_i).index(parent);
                var $table = $(".tbody"+tbl_i);
                var rows = $table.find(".table-row").get(); 
                var isSelected = $(this).hasClass("filter__link--active"+tbl_i);
                var isNumber = $(this).hasClass("filter__link--number"+tbl_i);
                
                rows.sort(function (a, b) {
                    var x = $(a).find(".table-data").eq(index).text();
                    var y = $(b).find(".table-data").eq(index).text();
    
                    // console.log(x,y)
                    if (isNumber == true) {
                        if (isSelected) {
                            return x - y;
                        } else {
                            return y - x;
                        }
                    } else {
                        if (isSelected) {
                            if (x > y) return -1;
                            if (x < y) return 1;
                            return 0;
                        } else {
                            if (x < y) return -1;
                            if (x > y) return 1;
                            return 0;
                        }
                    }
                });
    
                $.each(rows, function (index, row) {
                    $table.append(row);
                });
    
                return false;
            });
        });
    }
    tableSort('_a');
    tableSort('_g');
    tableSort('_d');
    tableSort('_m');
    tableSort('_f');
    tableSort('_mf');
    tableSort('_mm');
    tableSort('_md');
    tableSort('_mg');
})
function filter_table_data(inp, tbl, col){
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(inp);
    filter = input.value.toUpperCase();
    table = document.getElementById(tbl);
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[col];
        console.log(td)
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }       
    }
};
function quoteFilter(min, max, tbl, col){
    var min_inp, max_inp, min_filter, max_filter, table, tr, td, i, txtValue;
    min_inp = document.getElementById(min);
    max_inp = document.getElementById(max);
    min_filter = +min_inp.value;
    max_filter = +max_inp.value;
    table = document.getElementById(tbl);
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[col];
        if (td) {
            txtValue = +td.textContent || +td.innerText;
            if (txtValue >= min_filter && txtValue <= max_filter) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
};