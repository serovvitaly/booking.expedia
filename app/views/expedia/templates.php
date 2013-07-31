<script id="tpl-search-result-item" type="text/x-jquery-tmpl">
<div data-hotel="${hotelId}" class="sri-box rounded white"><div class="rwrapper">
    <div class="image"><img alt="64x64" src="http://images.travelnow.com${thumbNailUrl}"></div>
    <div>
      <div class="name">${name}<i class="icon-plane" title="${airportName}"></i></div>
      <div class="note">${locationDescription}</div>
      <div class="price"><span>от ${lowRate} <sup>${rateCurrencyCode}</sup></span><br>${totalRate}<sup style="font-size:9px">${rateCurrencyCode}</sup></div>     
    </div>
    <div class="controls">
      {{if likes > 0}}<span title="Нравится"><i class="icon-heart"></i> ${likes}</span>{{/if}}
      {{if comments > 0}}<span title="Комментарии"><i class="icon-comment"></i> ${comments}</span>{{/if}}
      <img class="rating" alt="рейтинг: ${hotelRating}" src="/skins/base/img/ratings/rat-blue-${hotelRating}.png" />
    </div>
</div></div>
</script>

<script id="tpl-hotel-info" type="text/x-jquery-tmpl">
<div id="exp-hotel-info" class="rounded white" style="display:none">
  <div class="hi-title">
    <i class="hi-close" onclick="retov(); return false;"></i>
    <span class="hi-name">${name}</span><span class="hi-stars"><img alt="рейтинг: ${hotelRating}" src="/skins/base/img/ratings/rat-${hotelRating}.png"></span>
  </div>
  <div class="rwrapper">
      <div class="row-fluid">
        <div class="span6">
          {{if images.length > 0}}
          <div style="width: 404px; height: 320px; background: #EEE;">
            <div id="hotel-galleria" style="display:none">
            {{each images}}
              <a href="${url}"><img alt="" style="margin-bottom:3px" src="${thumbnailUrl}"></a>
            {{/each}}
            </div>
          </div>
          {{else}}
            НЕТ КАРТИНОК
          {{/if}}
        </div>
        <div class="span6">
          <div class="hotel-address-box">
            <div class="city"><strong>${city}</strong> (${countryCode})</div>
            <div class="address">${address}</div>
            <div class="postalcode">почтовый индекс: <span>${postalCode}</span></div>
          </div>
          
          <div>
          
          </div>
          
          <a href="#" onclick="scrollToRooms(); return false;" class="button button-rounded button-flat-caution">БРОНИРОВАТЬ</a>
          
          <div>
            <div class="btn-group" style="text-align: center">
              <button class="btn btn-large" style="width: 120px" onclick="showMap(${latitude}, ${longitude}, '${name}');">На карте</button>
              <button class="btn btn-large" style="width: 120px" onclick="showPan(${latitude}, ${longitude});">Панорама</button>
            </div>
          </div>
          
        </div>
      </div>
  </div>
  
  <div class="rwrapper hdt-list">
    {{if dt_locationDescription}}
    <div class="hdt-item">{{html dt_locationDescription}}</div>
    {{/if}}
    {{if dt_businessAmenitiesDescription}}
    <div class="hdt-item">{{html dt_businessAmenitiesDescription}}</div>
    {{/if}}
    {{if dt_amenitiesDescription}}
    <div class="hdt-item">{{html dt_amenitiesDescription}}</div>
    {{/if}}
  </div>
  
  <div class="rwrapper ral5011">
    <p style="padding-top:30px"><strong>Адрес:</strong> ${city}, ${address}</p>
    <i class="arrow-down arrow-ral5011"></i>
  </div>
  
  <div class="hotel-map-box" style="display:none"><div id="hotel-map" style="height:400px; width: 870px"></div></div>
  
  {{if amenities.length > 0}}
  <div class="rwrapper" style="display:none">
    <div class="rw-title">
      <i class="collapser"></i>
      <h3>Опции отеля</h3>
    </div>
    <div class="rw-body">
    {{each amenities}}
      <span class="amenity-item" title="${amenity}">${amenity}</span>
    {{/each}}
    <div class="clear"></div>
    </div>
  </div>
  {{/if}}
  
  <div class="rooms-container">
  </div>

</div>
</script>
          
<script id="tpl-book-form" type="text/x-jquery-tmpl">
<div id="exp-book-form" class="rounded white" style="display:none"><div class="rwrapper">
  <h3 style="margin:0">Бронирование <a href="#" onclick="return false;" class="button-return" style="font-size:12px;font-weight: normal;padding-left:18px">вернуться к описание отеля</a></h3>
  <div style="height:20px"></div>
  <table>
    <tr><td>За проживание:</td><td>${commissionableUsdTotal} ${currencyCode}</td></tr>
    <tr><td>Налоги и сборы:</td><td>${surchargeTotal} ${currencyCode}</td></tr>
    <tr><td><strong>К оплате:</strong></td><td>${chargeableRate} ${currencyCode}</td></tr>
  </table>
  <form class="form-horizontal" method="POST" action="/expedia/book" style="margin-top:40px">
    <input type="hidden" name="hotelId" value="${hotelId}">
    <input type="hidden" name="arrivalDate" value="${arrivalDate}">
    <input type="hidden" name="departureDate" value="${departureDate}">
    <input type="hidden" name="supplierType" value="${supplierType}">
    <input type="hidden" name="rateKey" value="${rateKey}">
    <input type="hidden" name="roomTypeCode" value="${roomTypeCode}">
    <input type="hidden" name="rateCode" value="${rateCode}">
    <input type="hidden" name="chargeableRate" value="${chargeableRate}">
    <div class="control-group">
      <label class="control-label">Имя</label>
      <div class="controls">
        <input type="text" name="firstName" value="tester">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Фамилия</label>
      <div class="controls">
        <input type="text" name="lastName" value="testing">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Email</label>
      <div class="controls">
        <input type="text" name="email" value="test@yourSite.com">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Телефон</label>
      <div class="controls">
        <input type="text" name="homePhone" value="2145370159">
      </div>
    </div>
    
    <fieldset>
    <legend>Адрес</legend>
    
    <div class="control-group">
      <label class="control-label">Страна</label>
      <div class="controls">
        <input type="text" name="countryCode" style="width:50px" value="US">
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label">Город</label>
      <div class="controls">
        <input type="text" name="city" value="Bellevue">
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label">Индекс</label>
      <div class="controls">
        <input type="text" name="postalCode" value="98004">
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label">Адрес</label>
      <div class="controls">
        <input type="text" name="address1" value="travelnow">
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label">stateProvinceCode</label>
      <div class="controls">
        <input type="text" name="stateProvinceCode" value="WA">
      </div>
    </div>


        
    </fieldset>
    
    <fieldset>
    <legend>Карта</legend>
        
    <div class="control-group">
      <label class="control-label">Номер карты</label>
      <div class="controls">
        <input type="text" name="creditCardNumber" value="5401999999999999">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Тип карты</label>
      <div class="controls">
        <select name="creditCardType" style="width:auto">
          <option value="VI">Visa</option>
          <option value="AX">American Express</option>
          <option value="BC">BC Card</option>
          <option value="CA" selected="selected">MasterCard</option>
          <option value="CB">Carte Blanche</option>
          <option value="CU">China Union Pay</option>
          <option value="DS">Discover</option>
          <option value="DC">Diners Club</option>
          <option value="T">Carta Si</option>
          <option value="R">Carte Bleue</option>
          <option value="N">Dankort</option>
          <option value="L">Delta</option>
          <option value="E">Electron</option>
          <option value="JC">Japan Credit Bureau</option>
          <option value="TO">Maestro</option>
          <option value="S">Switch</option>  
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Защитный код</label>
      <div class="controls">
        <input type="text" name="creditCardIdentifier" style="width:50px" value="123">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Годна до</label>
      <div class="controls">
        <input type="text" style="width:20px" name="creditCardExpirationMonth" value="11"> / <input type="text" style="width:40px" name="creditCardExpirationYear" value="2015">
      </div>
    </div>
        
    </fieldset>
    
    <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn">Бронировать</button>
      </div>
    </div>
    
  </form>
  
</div></div>
</script>


<script id="tpl-hotel-room" type="text/x-jquery-tmpl">
<div class="hotel-room rwrapper">
  <div class="hr-sp-6">
    <strong>${roomTypeDescription}</strong>
    <div>Максимальная вместимость: ${quotedOccupancy}</div>
  </div>
  <div class="hr-sp-2 hr-right hr-price">
    ${rateTotal} <sup>${currencyCode}</sup>
  </div>
  <div class="hr-sp-2 hr-right">
    <a href="#" onclick="return false;" class="button button-rounded button-flat-caution button-small">БРОНИРОВАТЬ</a>
  </div>
</div>
</script>

<script id="tpl-book-result" type="text/x-jquery-tmpl">
<div id="exp-book-result" class="rounded white" style="display:none"><div class="rwrapper">
  <p class="content" style="text-align:center">{{html content}}</p>
</div></div>
</script>

<script id="tpl-book-success" type="text/x-jquery-tmpl">
<div id="exp-book-success" style="display:none">
  <h4>Операция прошла успешно</h4>
  <p>Статус бронирования: <strong>${reservationStatusCode}</strong></p>
  <table>
    <tr><td>Идентификатор:</td><td>${itineraryId}</td></tr>
    <tr><td>Отель:</td><td>${hotelName}</td></tr>
    <tr><td>Адрес:</td><td>${hotelCity}, ${hotelAddress}</td></tr>
    <tr><td>Дата заезда:</td><td>${arrivalDate}</td></tr>
    <tr><td>Дата выезда:</td><td>${departureDate}</td></tr>
    <tr><td>Количество комнат:</td><td>${numberOfRoomsBooked}</td></tr>
    <tr><td>Человек в комнате:</td><td>${rateOccupancyPerRoom}</td></tr>
    <tr><td>Комната:</td><td>${roomDescription}</td></tr>
  </table>
</div>
</script>