@layout('layouts.testfront')
@section('content')
	
	<div class="row">
      <div class="span2">
        <form action="/expedia/search" method="POST" id="exp-form">
          
          <input type="hidden" name="page" value="1">
          
          <input type="submit" class="btn btn-primary" style="width: 100%;" value="Поиск отелей">
          
          <fieldset style="margin-bottom: 30px; margin-top: 20px;">
            <input type="text" style="width: 160px; display: inline;" name="city" placeholder="Город" value="Moscow">
            <input type="text" style="width: 72px; display: inline;" name="arrivalDate"   class="datepicker" placeholder="Заезд" value="08/03/2013">
            <input type="text" style="width: 73px; display: inline;" name="departureDate" class="datepicker" placeholder="Выезд" value="08/05/2013">
          </fieldset>
          
          <fieldset style="margin-bottom: 30px; margin-top: 20px; display: none;">
            <legend style="margin-bottom: 10px;font-size: 16px;line-height: 26px;">Цена</legend>
            от: <input type="text" style="width: 50px; display: inline;">
            до: <input type="text" style="width: 50px; display: inline;">
          </fieldset>
          
          <fieldset style="margin-bottom: 30px;">
            <legend style="margin-bottom: 10px;font-size: 16px;line-height: 26px;">Удобства</legend>
            <label><input name="amenities[1]" value="1" type="checkbox" style="display: inline;"> - бассейн</label>
            <label><input name="amenities[2]" value="2" type="checkbox" style="display: inline;"> - фитнес-центр</label>
            <label><input name="amenities[3]" value="3" type="checkbox" style="display: inline;"> - ресторан</label>
            <label><input name="amenities[4]" value="4" type="checkbox" style="display: inline;"> - мероприятия для детей</label>
            <label><input name="amenities[5]" value="5" type="checkbox" style="display: inline;"> - бесплатный завтрак</label>
            <label><input name="amenities[6]" value="6" type="checkbox" style="display: inline;"> - конференц залы</label>
            <label><input name="amenities[7]" value="7" type="checkbox" style="display: inline;"> - с животными</label>
            <label><input name="amenities[8]" value="8" type="checkbox" style="display: inline;"> - инвалидной коляске</label>
            <label><input name="amenities[9]" value="9" type="checkbox" style="display: inline;"> - кухня/мини-кухня</label>
          </fieldset>
            
          <fieldset style="margin-bottom: 30px;">
            <legend style="margin-bottom: 10px;font-size: 16px;line-height: 26px;">Рейтинг отеля</legend>
            от: <input type="text" style="width: 50px; display: inline;" name="minStarRating">
            до: <input type="text" style="width: 50px; display: inline;" name="maxStarRating">
          </fieldset>
          
          <fieldset style="margin-bottom: 30px;">
            <legend style="margin-bottom: 10px;font-size: 16px;line-height: 26px;">Тип проживания</legend>
            <label><input name="propertyCategory[1]" value="1" type="checkbox" style="display: inline;"> - отель</label>
            <label><input name="propertyCategory[2]" value="2" type="checkbox" style="display: inline;"> - люкс</label>
            <label><input name="propertyCategory[3]" value="3" type="checkbox" style="display: inline;"> - курортный</label>
            <label><input name="propertyCategory[4]" value="4" type="checkbox" style="display: inline;"> - аренда на отпуск/кондо</label>
            <label><input name="propertyCategory[5]" value="5" type="checkbox" style="display: inline;"> - завтрак в кровать</label>
            <label><input name="propertyCategory[6]" value="6" type="checkbox" style="display: inline;"> - все включено</label>
          </fieldset>
          
          <fieldset style="margin-bottom: 30px;">
            <legend style="margin-bottom: 10px;font-size: 16px;line-height: 26px;">Количество спален</legend>
            <input type="text" style="width: 50px; display: inline;" name="numberOfBedRooms">
          </fieldset>
          
          <fieldset style="margin-bottom: 30px;">
            <legend style="margin-bottom: 10px;font-size: 16px;line-height: 26px; display: none;">Достопримечательности</legend>
            
          </fieldset>
          
          <input name="paging" type="hidden" value="false">
          <input name="cacheKey" type="hidden">
          <input name="cacheLocation" type="hidden">
            
        </form>
      </div>
      <div class="span10" id="exp-result-content"></div>
    </div>
    
    <script src="/js/form/jquery.form.js"></script>
    <script src="/js/tmpl/jquery.tmpl.min.js"></script>
    <script>
        
        function htmlspecialchars_decode (string, quote_style) {
          var optTemp = 0,
            i = 0,
            noquotes = false;
          if (typeof quote_style === 'undefined') {
            quote_style = 2;
          }
          string = string.toString().replace(/&lt;/g, '<').replace(/&gt;/g, '>');
          var OPTS = {
            'ENT_NOQUOTES': 0,
            'ENT_HTML_QUOTE_SINGLE': 1,
            'ENT_HTML_QUOTE_DOUBLE': 2,
            'ENT_COMPAT': 2,
            'ENT_QUOTES': 3,
            'ENT_IGNORE': 4
          };
          if (quote_style === 0) {
            noquotes = true;
          }
          if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags
            quote_style = [].concat(quote_style);
            for (i = 0; i < quote_style.length; i++) {
              // Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
              if (OPTS[quote_style[i]] === 0) {
                noquotes = true;
              } else if (OPTS[quote_style[i]]) {
                optTemp = optTemp | OPTS[quote_style[i]];
              }
            }
            quote_style = optTemp;
          }
          if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
            string = string.replace(/&#0*39;/g, "'"); // PHP doesn't currently escape if more than one 0, but it should
            // string = string.replace(/&apos;|&#x0*27;/g, "'"); // This would also be useful here, but not a part of PHP
          }
          if (!noquotes) {
            string = string.replace(/&quot;/g, '"');
          }
          // Put this in last place to avoid escape being double-decoded
          string = string.replace(/&amp;/g, '&');

          return string;
        }
    
        
        function retov(){
            $('#exp-hotel-info').fadeOut(200, function(){
                $('#ext-search-result').fadeIn(200);
                $('#exp-hotel-info').remove();
            });
        }
        
        
        function loadNextPage(cacheKey, cacheLocation){
            $('#exp-form input[name="paging"]').val(true);
            $('#exp-form input[name="cacheKey"]').val(cacheKey);
            $('#exp-form input[name="cacheLocation"]').val(cacheLocation);
            $('#exp-form').submit();
        }
    
    
        $('#exp-form input.datepicker').datepicker({
            //dateFormat: 'dd/mm/yy'
        });
    
        $('#exp-form').ajaxForm({
            dataType: 'json',
            beforeSubmit: function($formData, jqForm, options){
                if ($('#exp-form input[name="paging"]').val() == 'false') {
                    $('#exp-result-content').html('<p style="text-align:center">поиск отелей...</p>');
                }
            }, 
            success:  function(data, statusText, xhr, $form){
                if (data.result && data.result.length > 0) {
                    if ($('#exp-form input[name="paging"]').val() == 'false') {
                        $('#exp-result-content').html('<div id="ext-search-result"></div>');
                    }
                    $.each(data.result, function(index, item){
                        item.shortDescription = htmlspecialchars_decode(item.shortDescription.replace('&lt;b&gt;Местоположение. &lt;/b&gt; &lt;br /&gt;',''));
                        $.tmpl($('#tpl-search-result-item').html().trim(), item).appendTo('#ext-search-result');
                    });
                    
                    $('#ext-search-result .media').click(function(){
                        $.ajax({
                            url: '/expedia/hotel_info',
                            dataType: 'json',
                            type: 'POST',
                            data:{
                                hotelId: $(this).attr('data-hotel'),
                                arrivalDate:   $('#exp-form input[name="arrivalDate"]').val(),
                                departureDate: $('#exp-form input[name="departureDate"]').val()
                            },
                            success: function(data){
                                if (data.errors && data.errors.length > 0) {
                                    $('#exp-result-content').html('');
                                    $.each(data.errors, function(index, item){
                                        $('#exp-result-content').append('<p style="text-align:center">'+item.message+'</p>');
                                    });
                                    return;
                                }
                                if (data.result) {
                                    $('#ext-search-result').fadeOut(200, function(){
                                        //data.result.checkInInstructions = htmlspecialchars_decode(data.result.checkInInstructions);
                                        $.tmpl($('#tpl-hotel-info').html().trim(), data.result).appendTo('#exp-result-content');
                                        $('#exp-hotel-info .room-item a.book').click(function(){
                                            var item = $(this);
                                            $('#exp-hotel-info').fadeOut(200, function(){
                                                $.tmpl($('#tpl-book-form').html().trim(), {
                                                    hotelId: data.result.HotelSummary.hotelId,
                                                    arrivalDate: data.result.HotelRoomAvailabilityResponse.arrivalDate,
                                                    departureDate: data.result.HotelRoomAvailabilityResponse.departureDate,
                                                    supplierType: item.attr('data-suppliertype'),
                                                    rateKey: item.attr('data-ratekey'),
                                                    roomTypeCode: item.attr('data-roomtypecode'),
                                                    rateCode: item.attr('data-ratecode'),
                                                    currencyCode: item.attr('data-currencycode'),
                                                    commissionableUsdTotal: item.attr('data-commissionableusdtotal'),
                                                    surchargeTotal: item.attr('data-surchargetotal'),
                                                    chargeableRate: item.attr('data-chargeablerate')
                                                }).appendTo('#exp-result-content');
                                                $('#exp-book-form .button-return').click(function(){
                                                    $('#exp-book-form').fadeOut(200, function(){
                                                        $('#exp-hotel-info').fadeIn(200);
                                                        $('body,html').animate({scrollTop: 0}, 200);
                                                        $('#exp-book-form').remove();
                                                    });
                                                });
                                                $('#exp-book-form form').ajaxForm({
                                                    dataType: 'json',
                                                    beforeSubmit: function($formData, jqForm, options){
                                                        $('#exp-book-form').fadeOut(200, function(){
                                                            $.tmpl($('#tpl-book-result').html().trim(), {
                                                                content: '<h3>Бронируем комнату...</h3>'
                                                            }).appendTo('#exp-result-content');
                                                            $('#exp-book-result').fadeIn(200);
                                                        });
                                                    },
                                                    success:  function(data, statusText, xhr, $form){
                                                        
                                                        if (data.errors && data.errors.length > 0) {
                                                            $('#exp-book-result .content').html('');
                                                            $.each(data.errors, function(index, item){
                                                                $('#exp-book-result .content').append('<p style="text-align:center">'+item.message+'</p>');
                                                            });
                                                            return;
                                                        }
                                                        
                                                        if (data.success == true && data.result.itineraryId && data.result.itineraryId > 0) {
                                                            $('#exp-book-result').fadeOut(200, function(){
                                                                $.tmpl($('#tpl-book-success').html().trim(), data.result).appendTo('#exp-result-content');
                                                                $('#exp-book-success').fadeIn(200, function(){
                                                                    $('#exp-book-result').remove();
                                                                });
                                                            });
                                                        } else {
                                                            $('#exp-book-result .content').html('<strong style="color:red">Не удалось забронировать</strong>');
                                                        }
                                                    }
                                                });
                                                $('#exp-book-form').fadeIn(200);
                                                $('body,html').animate({scrollTop: 0}, 200);
                                            });
                                        });
                                        $('#exp-hotel-info').fadeIn(200);
                                        $('body,html').animate({scrollTop: 0}, 200);
                                    });
                                }
                            }
                        });
                    });
                                        
                } else {
                    $('#exp-result-content').html('<p style="text-align:center">Нет данных для отображения</p>');
                }
                
                if (data.addition) {
                    if (data.addition.moreResultsAvailable) {
                        //$('#ext-search-result').prepend('<p>Найдено '+data.addition.activePropertyCount+'.</p>');
                        //var pagination = '<div class="pagination pagination-centered"><ul><li><a href="#0">Сюда</a></li>';
                        //for (var p = 1; p <= Math.ceil(data.addition.activePropertyCount / 20); p++) {
                            //pagination += '<li><a href="#'+p+'">'+p+'</a></li>';
                        //}
                        //pagination += '<li><a href="#__">Туда</a></li></ul></div>';
                        var cacheKey      = data.addition.cacheKey;
                        var cacheLocation = data.addition.cacheLocation;
                        var pagination = '<div style="text-align:center; margin: 40px"><button onclick="loadNextPage(\''+cacheKey+'\',\''+cacheLocation+'\')" class="btn btn-large">Загрузить еще</button></div>';
                        $('#ext-search-result').append(pagination);
                    }
                    else {
                        //$('#ext-search-result').prepend('<p>Найдено '+data.result.length+'.</p>');
                    }
                }
                else {
                    $('#ext-search-result').prepend('<p>Найдено '+data.result.length+'.</p>');
                }
                
                if (data.errors && data.errors.length > 0) {
                    $('#exp-result-content').html('');
                    $.each(data.errors, function(index, item){
                        if (item.message == 'Result was null') {
                            item.message = 'Нет данных для отображения';
                        }
                        $('#exp-result-content').append('<p style="text-align:center">'+item.message+'</p>');
                    });
                }
            }                
        });
    </script>
    
    @include('expedia.templates')
    
@endsection