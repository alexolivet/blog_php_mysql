/**
 * Character Counter v1.0
 * 
 * Copyright 2018 Pekka Ruuska
 * Released under the MIT license
 * 
 * A simple character counter.
 * Works with inputfields and textareas as well as DOM-elements that work with contenteditable attribute.
 *
 * @author Pekka Ruuska
 * @author Twitter: PekkaRuuska
 *
 */

(function ($) {
    $.fn.characterCounter = function (options) {

        var settings = $.extend({
            minlength: 0,
            maxlength: 160,
            blockextra: false,
            position: 'bottom',
            counterclass: 'character-counter-indicator',
            alertclass: 'out-of-range',
            textformat: '[used]/[max]',
            onOutOfRange: function(count, min, max){},
            onBackToRange: function (count, min, max){}
        }, options);

        this.each(function(){

            var self = $(this),
                dataset = this.dataset,
                fieldId = self.attr('id'),
                minlength,
                maxlength,
                blockextra,
                position,
                counterclass,
                alertclass,
                textformat,
                fieldValue,
                fieldValueLength,
                counterText;

            dataset.charcountMinlength !== undefined ? minlength = Math.floor(dataset.charcountMinlength) : minlength = Math.floor(settings.minlength);
            dataset.charcountMaxlength !== undefined ? maxlength = Math.floor(dataset.charcountMaxlength) : maxlength = Math.floor(settings.maxlength);
            dataset.charcountBlockextra !== undefined ? blockextra = (dataset.charcountBlockextra === 'true') : blockextra = settings.blockextra;
            dataset.charcountPosition !== undefined ? position = dataset.charcountPosition : position = settings.position;
            dataset.charcountCounterclass !== undefined ? counterclass = dataset.charcountCounterclass : counterclass = settings.counterclass;
            dataset.charcountAlertclass !== undefined ? alertclass = dataset.charcountAlertclass : alertclass = settings.alertclass;
            dataset.charcountTextformat !== undefined ? textformat = dataset.charcountTextformat : textformat = settings.textformat;

            /**
             * 
             * Element that is the actual visible counter
             */
            var element = '<p class="' + counterclass + '" data-charcount-for="' + fieldId + '"></p>';

            if (position === 'top'){
                $(element).insertBefore('#' + fieldId);
            }
            else if (position === 'bottom') {
                $(element).insertAfter('#' + fieldId);
            }
            else if ($(position).length > 0) {
                $(position).html(element);
            }
            else {
                $(element).insertAfter('#' + fieldId);
            }


            /**
             * The default initialization of the counter
             */
            initCounter(self, textformat, fieldId, fieldValueLength, minlength, maxlength, blockextra, alertclass, settings.onOutOfRange, settings.onBackToRange);
            

            /**
             * Every time an area's (input, textarea, div, etc.) content is updated we update the counter's text.
             */
            self.on("input propertychange", function () {
                initCounter(self, textformat, fieldId, fieldValueLength, minlength, maxlength, blockextra, alertclass, settings.onOutOfRange, settings.onBackToRange);
            });
            
        });

    };


    /**
     * Function that calls other functions to initialize and update the counter's content as well as
     * remove characters from element when maxlength has been reached
     */
    function initCounter(element, textformat, fieldId, fieldValueLength, minlength, maxlength, blockextra, alertclass, onOutOfRange, onBackToRange){
        fieldValueLength = countTextLength(element);
        if (blockextra === true && maxlength > 0 && fieldValueLength > maxlength) {
            fieldValueLength = maxlength;
            removeExtraText(element, maxlength);
        }

        var counterElement = $('[data-charcount-for=' + fieldId + ']');

        if ((maxlength > 0 || minlength > 0) && (fieldValueLength > maxlength || fieldValueLength < minlength)) {
            counterElement.data('charcount-outofrange', 'true');
            if (alertclass != ''){
                counterElement.addClass(alertclass);
            }
            
            onOutOfRange(fieldValueLength, minlength, maxlength);
        }
        else {
            if (counterElement.data('charcount-outofrange') === 'true'){
                counterElement.removeData('charcount-outofrange');
                onBackToRange(fieldValueLength, minlength, maxlength);
            }
            if (alertclass != '') {
                counterElement.removeClass(alertclass);
            }

            
        }

        updateCounterText(textformat, fieldId, fieldValueLength, minlength, maxlength);
    }


    function countTextLength(element) {
        if (element.prop('tagName') === 'INPUT' || element.prop('tagName') === 'TEXTAREA') {
            fieldValue = element.val();
        }
        else {
            fieldValue = element.text();
        }
        return fieldValue.length;
    }


    /*
     * Removes text that goes over maximumlength creating the illusion of "preventing typing"
     * when maximum number of characters has been reached
     */
    function removeExtraText(element, maxlength) {
        if (element.prop('tagName') === 'INPUT' || element.prop('tagName') === 'TEXTAREA') {
            fieldValue = element.val();
            element.val(fieldValue.substring(0, maxlength));
        }
        else {
            fieldValue = element.text();
            element.text(fieldValue.substring(0, maxlength));
        }
    }


    /*
     * Updates the counter's content with correctly formatted string
     */
    function updateCounterText(textformat, fieldId, fieldValueLength, minlength, maxlength) {
        var charsLeft = Math.floor(maxlength) - fieldValueLength,
            charsUnder = minlength - fieldValueLength,
            charsOver = fieldValueLength - Math.floor(maxlength);

        if (charsLeft < 0) {
            charsLeft = 0;
        }

        if (charsUnder < 0) {
            charsUnder = 0;
        }

        if (charsOver < 0) {
            charsOver = 0;
        }

        var counterText = textformat.replace(/\[used\]/g, fieldValueLength).replace(/\[under\]/g, charsUnder).replace(/\[left\]/g, charsLeft).replace(/\[over\]/g, charsOver).replace(/\[min\]/g, minlength).replace(/\[max\]/g, maxlength);
        $('[data-charcount-for=' + fieldId + ']').html(counterText);
    }

}(jQuery));

$(function(){
    $.each($('[data-charcount-enable=true]'), function(){
        $(this).characterCounter();
    });
});