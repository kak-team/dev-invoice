(function ($) {
	$.fn.simpleMoneyFormat = function() {
		this.each(function(index, el) {		
			var elType = null; // input or other
			var value = null;
			 x = '' ;
			// get value
			if($(el).is('input') || $(el).is('textarea')){
				
				elType = 'input';
			} else {
				value = $(el).text().replace(/,/g, '');
				elType = 'other';
			}
			value_array = $(el).val().split('.');
			if(typeof value_array[1] === 'undefined') {
				x = '';
			}else{  x = value_array[1];}
			value = value_array[0].replace(/,/g, '');
			
			// if value changes
			$(el).on('change', function(){
				value_keyup = $(el).val().split('.');
				if(typeof value_keyup[1] === 'undefined') {
					k = '';
				}else{  k = value_keyup[1];}
				value = value_keyup[0].replace(/,/g, '');
				;
				
				formatElement(el, elType, value+'.'+k); // format element
			});
			
			formatElement(el, elType, value+'.'+x); // format element
		});
		
		function formatElement(el, elType, value){
			
			var result = '';
			value_array = value.split('.');
			if(typeof value_array[1] === 'undefined') {
				y = '';
			}else{  y = value_array[1];}
			
			var valueArray = value_array[0].split('');
			var resultArray = [];
			var counter = 0;
			var temp = '';
			for (var i = valueArray.length - 1; i >= 0; i--) {
				temp += valueArray[i];
				counter++
				if(counter == 3){
					resultArray.push(temp);
					counter = 0;
					temp = '';
				}
			};
			if(counter > 0){
				resultArray.push(temp);				
			}
			for (var i = resultArray.length - 1; i >= 0; i--) {
				var resTemp = resultArray[i].split('');
				for (var j = resTemp.length - 1; j >= 0; j--) {
					result += resTemp[j];
				};
				if(i > 0){
					result += ','
				}
			};
			if(elType == 'input'){

				$(el).val(result+'.'+y);
			} else {
				$(el).empty().text(result);
			}
		}
	};
}(jQuery));