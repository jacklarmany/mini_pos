//find all fieldsets marked as "toggleAble"
$('fieldset.toggleAble').each(function() {
    var $fieldSet = $(this);
    //find the "legend"... if it does not exist then add it
    var $theLegend = $fieldSet.find('> legend');
    if ($theLegend.length === 0) {
        //add a legend if it does not exists and return reference to it
        $theLegend = $fieldSet.append('<legend>&nbsp;</legend>').find('> legend');
    }

    $theLegend.click(function () {
        //when the legend gets clicked, add an "expanded" class to the parent container fieldset... css will take care of the rest in terms of displaying
        $(this).parent().toggleClass('expanded');
    });


    if ($theLegend.find('> span').length == 0) {
        //there is no span... so take contents of legend and wrap it with a span... the CSS needs this
        $theLegend.html('<span>' + $theLegend.html() + '</span>');
    }
});

