String.prototype.translit = (function(){
    var L = {
'А':'A','а':'a','Б':'B','б':'b','В':'V','в':'v','Г':'G','г':'g',
'Д':'D','д':'d','Е':'E','е':'e','Ё':'Yo','ё':'yo','Ж':'Zh','ж':'zh',
'З':'Z','з':'z','И':'I','и':'i','Й':'Y','й':'y','К':'K','к':'k',
'Л':'L','л':'l','М':'M','м':'m','Н':'N','н':'n','О':'O','о':'o',
'П':'P','п':'p','Р':'R','р':'r','С':'S','с':'s','Т':'T','т':'t',
'У':'U','у':'u','Ф':'F','ф':'f','Х':'Kh','х':'kh','Ц':'Ts','ц':'ts',
'Ч':'Ch','ч':'ch','Ш':'Sh','ш':'sh','Щ':'Sch','щ':'sch','Ъ':'"','ъ':'"',
'Ы':'Y','ы':'y','Ь':"'",'ь':"'",'Э':'E','э':'e','Ю':'Yu','ю':'yu',
'Я':'Ya','я':'ya'
        },
        r = '',
        k;
    for (k in L) r += k;
    r = new RegExp('[' + r + ']', 'g');
    k = function(a){
        return a in L ? L[a] : '';
    };
    return function(){
        return this.replace(r, k);
    };
})();
if($('.anylist').length){
	//alert(1);
	$('table#module tr').addClass('togglable');
	$('tbody').each(function(){
		$this=$(this);

		//$this.append('<tr class="last-tr"><td colspan="8">'+'</td></tr>');
		//$this.find('td:last').html($this.find('td:last').html());
		//$this.find('tr:first').find('td:last').remove();
		$this.prepend('<tr></tr>');
		$this.find('tr:first').html($('#module thead tr').clone().html());
		$this.prepend('<tr class="n-spolier"><td colspan="9"><span></span><br/><a href="#" class="">Свернуть</a><a href="#" style="display:none;" class="">Развернуть</a></td></tr>');		
		$this.find('.n-spolier span').text($this.find("input[name*='[title]']").attr('value'));
	});
	$('#module thead').remove();
	$('.n-spolier').click(function(){
		$(this).siblings('tr').slideToggle('slow');
		$(this).find('a').toggle();
		return false;
	})

}
$user='';
$(document).ready(function(){
	$('.div3 span').each(function(){
		$user_ = ($(this).text());
		if ($user_=='editor'){
			$user = 'editor';
		}
	})
	if ($user == 'editor'){
		if(getUrlVars()['route']== 'extension/module'){
			$('table.list tr').each(function(){
				$this = $(this);
				if($this.find('.right a').length == 1){
					$this.hide();
				}
			})
		}		
		$('#menu li').each(function(){
			$this = $(this);
			$this.attr('data-text', $this.find('>a').text());
		})
		$('li[data-text="Атрибуты"]').hide();
		if ($('.heading h1').text()=='Модули'){

		}
	}
})
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
if ($('#tab-module-1').length){
	$('tr').each(function(){
		$this= $(this);
		$this.addClass('dt'+($this.find('td:first').text().replace(/(\r\n|\n|\r|\ )/gm,"").translit()));
	})
	$('.vtabs>a').each(function(){
		$this=$(this);
		id = ('#tab-'+$this.attr('id'));

		title = ($(id).find('.dtZagolovokelementa input').val());		
		$this.prepend(title+': ');
		///$this.prepend(''+title+' <br/>');
		//console.log(title)
	})
}
if ($('#tab-attribute #attribute').length){
	$('table.form tr').each(function(){
	//	$this=$(this);
	//	$this.attr('ztext',$this.find('td:first').text());
	})
	//$('#tab-image').append('<table><tr>'+$('[ztext="Изображение товара:"]').html()+'</tr></table>');
//	$('#attribute thead').after('<tbody id="attribute-row1"><tr><td class="left"><input type="text" name="product_attribute[1][name]" value="Акция" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"><input type="hidden" name="product_attribute[1][attribute_id]" value="16"></td><td class="left"><textarea name="product_attribute[1][product_attribute_description][1][text]" cols="40" rows="5"></textarea><img src="view/image/flags/ru.png" title="Russian" align="top"><br></td><td class="left"><a onclick="$(\'#attribute-row1\').remove();" class="button">Удалить</a></td></tr></tbody>');
	//$('#attribute thead').after('<tbody id="attribute-row2"><tr><td class="left"><input type="text" name="product_attribute[2][name]" value="Серия" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"><input type="hidden" name="product_attribute[2][attribute_id]" value="14"></td><td class="left"><textarea name="product_attribute[2][product_attribute_description][2][text]" cols="40" rows="5"></textarea><img src="view/image/flags/ru.png" title="Russian" align="top"><br></td><td class="left"><a onclick="$(\'#attribute-row2\').remove();" class="button">Удалить</a></td></tr></tbody>');
	//$('#attribute thead').after('<tbody id="attribute-row3"><tr><td class="left"><input type="text" name="product_attribute[3][name]" value="Страна" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"><input type="hidden" name="product_attribute[3][attribute_id]" value="15"></td><td class="left"><textarea name="product_attribute[3][product_attribute_description][3][text]" cols="40" rows="5"></textarea><img src="view/image/flags/ru.png" title="Russian" align="top"><br></td><td class="left"><a onclick="$(\'#attribute-row3\').remove();" class="button">Удалить</a></td></tr></tbody>');
}
$('.htabs>a').each(function(){
	$this=$(this);
	console.log($this.text());
	$this.addClass($this.text().translit().replace(/(\r\n|\n|\r|\ )/gm,""));
})
$('.Bonusnyebally, .Dizayn, .Optsii').hide();