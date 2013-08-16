
<div class="row">
  <div class="span3">
    <div class="sticker" style="width: 270px">
      <div class="rounded white" id="hotel-info-menu" style="display: none;">
        <div class="rwrapper">
           <ul class="nav nav-list menu-list">
             <li><a href="#"><i class="icon-chevron-right"></i>Информация об отеле</a></li>
             <li><a href="#"><i class="icon-chevron-right"></i>Статистика</a></li>
             <li><a href="#"><i class="icon-chevron-right"></i>Расположение</a></li>
             <li><a href="#"><i class="icon-chevron-right"></i>Опции отеля</a></li>
             <li><a href="#"><i class="icon-chevron-right"></i>Комнаты</a></li>
           </ul>
        </div>
      </div>  
      <div class="rounded white">
        <div class="rwrapper">
        <form action="http://api.appros/expedia/search" method="POST" id="exp-form">
        
          <button class="button button-rounded button-flat-action" id="retov-button" onclick="retov(); return false;"><i class="icon-chevron-left icon-white" style="margin-left:-16px;margin-right:6px;"></i> Вернуться к списку отелей</button>
          
          <input type="submit" class="button button-rounded button-flat-primary" style="width: 100%;" value="Поиск отелей">
          
          <fieldset class="search-params">
            <input type="text" style="width: 236px; display: inline;" name="city" placeholder="Город" value="Moscow">
            <input type="text" style="width: 105px; margin-right: 9px; display: inline;" name="arrivalDate"   class="datepicker" placeholder="Заезд" value="<?= date('m/d/Y') ?>">
            <input type="text" style="width: 105px; display: inline;" name="departureDate" class="datepicker" placeholder="Выезд" value="<?= date('m/d/Y', time() + 3600*24*7) ?>">
            <hr style="margin: 0;">
            <a href="#">свернуть</a>
            <table>
                <tr>
                    <td rowspan="3" class="sp-room-number">Комната 1</td>
                    <td class="sp-item-row">Взрослых (18+)</td>
                    <td>
                      <select>
                        <option value="1">1</option>
                        <option value="2" selected="selected">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td class="sp-item-row">Детей (0-17)</td>
                    <td>
                      <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="sp-item-row">
                      <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                      <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                      <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                      <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                      <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                      <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </td>
                </tr>
            </table>
            
          </fieldset>
          
          <div id="search-filter">
          
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
          
          </div>
          
          <input name="paging" type="hidden" value="false">
          <input name="cacheKey" type="hidden">
          <input name="cacheLocation" type="hidden">
            
        </form>
        </div> 
      </div>
    </div>
  </div>
  <div class="span9">
    <div class="rounded white sticker" style="margin-bottom: 10px;" id="exp-sort-panel">
        <div class="rwrapper">
          <div class="btn-group">
            <button class="btn btn-mini">по цене</button>
            <button class="btn btn-mini">по рейтингу</button>
            <button class="btn btn-mini">по звездности</button>
          </div>
          <div class="btn-group">
            <button class="btn btn-mini">РУБ</button>
            <button class="btn btn-mini">EUR</button>
            <button class="btn btn-mini">USD</button>
          </div>
        </div>
    </div>
    <div id="exp-result-content"></div>
  </div>
</div>


<script>

    $(".sticker").sticky({topSpacing: 41, bottomSpacing: 50});
    
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
        $('#exp-hotel-info').fadeOut(400, function(){
            $('#exp-sort-panel-sticky-wrapper').fadeIn(400);
            $('#exp-search-result').fadeIn(400);
            delete $.template["tpl-hotel-info"];
            $('#exp-hotel-info').remove(); 
        });
        
        $('#search-filter').slideDown(400);
        $('#retov-button').fadeOut(200);
        $('#hotel-info-menu').slideUp(400);
    } 
    
    
    function loadNextPage(cacheKey, cacheLocation){
        $('#exp-form input[name="paging"]').val(true);
        $('#exp-form input[name="cacheKey"]').val(cacheKey);
        $('#exp-form input[name="cacheLocation"]').val(cacheLocation);
        $('#exp-form').submit();
    }
    
    
    function displayBlock(options){
        var opt = $.extend({
            //
        }, options);
    }
    
    
    function scrollToRooms(){
        $.scrollTo($('#exp-hotel-info .rooms-container'), 800);
    }
    
    
    function showMap(latitude, longitude, name){
        
        if ( typeof latitude != 'number' &&  typeof longitude != 'number' ) {
            return false;
        }
        
        if ( $('#exp-hotel-info .hotel-map-box').is(':hidden') ) {
            $('#exp-hotel-info .hotel-map-box').slideDown(400, null, function(){
                $.scrollTo($('#exp-hotel-info .hotel-map-box'), 800);
                gmapInitialize('hotel-map', {
                    zoom: 17,
                    hotelName: name,
                    latitude:  latitude,
                    longitude: longitude
                });
            });
        }
    }
    
    
    function loadHotelInfo(options){
        var fields = $.extend({
            //
        }, options);
        
        delete $.template["tpl-hotel-info"];
        $('#exp-hotel-info').remove();
        
        $('#exp-sort-panel-sticky-wrapper').fadeOut(400);
        $('#exp-search-result').fadeOut(400, function(){
            $('<div class="loader ajax-loader"></div>').prependTo('#exp-result-content').fadeIn(400);
        });
        
        $.ajax({
            url: 'http://api.appros/expedia/hotel-info',
            dataType: 'jsonp',
            type: 'POST',
            data: fields,
            success: function(data){
                //console.log(data);
                if (data.errors && data.errors.length > 0) {
                    $('#exp-result-content .loader').html('');
                    $.each(data.errors, function(index, item){
                        $('#exp-result-content .loader').html('<p>' + item.message + '</p>');
                    });
                    return;
                }
                if (data.result) {
                    $('#exp-result-content .loader').fadeOut(100, function(){});
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
                  /*  $('#exp-hotel-info').fadeIn(400, function(){
                        $('body,html').animate({scrollTop: 0}, 400);
                    });*/
                        
                    
                    $('#retov-button').fadeIn(200);
                    $('#search-filter').slideUp(400);
                    
                    $('#hotel-info-menu').slideDown(400, null, function(){
                        
                        $('#exp-hotel-info .rooms-container').html('');
                        $.ajax({
                            url: 'http://api.appros/expedia/room-availability',
                            dataType: 'jsonp',
                            data: {
                                hotelId:       fields.hotelId,
                                arrivalDate:   fields.arrivalDate,
                                departureDate: fields.departureDate
                            },
                            success: function(data){
                                
                                console.log(data);
                                
                                if (data.success) {
                                    if (data.result.items.length > 0) {
                                        $.each(data.result.items, function(index, item){
                                            $.tmpl($('#tpl-hotel-room').html().trim(), item).appendTo('#exp-hotel-info .rooms-container');
                                        });
                                    }
                                }
                            }
                        });
                         
                        $('#exp-hotel-info').fadeIn(400, function(){
                            
                            if (data.result.images.length > 0) {
                                Galleria.loadTheme('packages/jquery/galleria/themes/classic/galleria.classic.min.js');
                                Galleria.run('#hotel-galleria', {
                                    transition: 'fade',
                                    imageCrop: true,
                                    width: 404,
                                    height: 320 
                                });
                                
                                $('#hotel-galleria').fadeIn(400);    
                            }
                            
                            $('body,html').animate({scrollTop: 0}, 400);
                        });    
                        
                    });
                    
                    
                }
            }
        });
    }


    $('#exp-form input.datepicker').datepicker({
        //dateFormat: 'dd/mm/yy'
    });

    $('#exp-form').ajaxForm({
        dataType: 'jsonp',
        beforeSubmit: function($formData, jqForm, options){
            
            if ($('#search-filter').is(':hidden')) {
                $('#search-filter').slideDown(400);
                $('#hotel-info-menu').slideUp(400);
            }
            
            if ($('#exp-form input[name="paging"]').val() == 'false') {
                //$('#exp-result-content').html('<p style="text-align:center">поиск отелей...</p>');
                $('#exp-result-content').html('<div class="loader ajax-loader"></div>');
            }
        }, 
        success:  function(data, statusText, xhr, $form){
            
            console.log(data);
            
            if (data.result && data.result.items && data.result.items.length > 0) {
                if ($('#exp-form input[name="paging"]').val() == 'false') {
                    $('#exp-result-content').html('<div id="exp-search-result"></div>');
                }
                $.each(data.result.items, function(index, item){
                    //item.shortDescription = htmlspecialchars_decode(item.shortDescription.replace('&lt;b&gt;Местоположение. &lt;/b&gt; &lt;br /&gt;',''));
                    $.tmpl($('#tpl-search-result-item').html().trim(), item).appendTo('#exp-search-result');
                });
                
                $('#exp-search-result .sri-box').click(function(){
                    loadHotelInfo({
                        hotelId: $(this).attr('data-hotel'),
                        arrivalDate:   $('#exp-form input[name="arrivalDate"]').val(),
                        departureDate: $('#exp-form input[name="departureDate"]').val()
                    });
                });
                                    
            } else {
                $('#exp-result-content').html('<p style="text-align:center">Нет данных для отображения</p>');
            }
            
            if (data.addition) {
                if (data.addition.moreResultsAvailable) {
                    var cacheKey      = data.addition.cacheKey;
                    var cacheLocation = data.addition.cacheLocation;
                    var pagination = '<div style="text-align:center; margin: 40px"><button onclick="loadNextPage(\''+cacheKey+'\',\''+cacheLocation+'\')" class="btn btn-large">Загрузить еще</button></div>';
                    $('#exp-search-result').append(pagination);
                }
                else {
                    //$('#exp-search-result').prepend('<p>Найдено '+data.result.length+'.</p>');
                }
            }
            else {
                //$('#exp-search-result').prepend('<p>Найдено '+data.result.total+'</p>');
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
