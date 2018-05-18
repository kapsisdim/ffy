function deleteItem(element) {
    console.log(element);
    var name = element.id;
    var dataString = 'product='+ name;
    var parentId = '#par_' + element.id;
    var test = $.ajax({
        type: "POST",
        url: "/delete_item",
        data: dataString,
        success: function(request) {

        $(parentId).remove();

        if (request == 0) {
            $(".sum").text("(Basket empty)");
        } else {
            $(".sum").html("<strong>total: " + request + "</strong>");
        }

        
        }        
    });


    return false;
}

function toggle(switchElement) {
    var choice1 = document.getElementById("address-info");
    var choice2 = document.getElementById("payment-info");
    console.log(choice1, switchElement);
    console.log(choice2, switchElement);
        
    if (switchElement == "store") {
        choice1.style.display = "none";

        document.querySelector("#first-name").required = false; 
        document.querySelector("#sir-name").required = false; 
        document.querySelector("#address").required = false;  
        document.querySelector("#city").required = false; 
        document.querySelector("#state").required = false; 
        document.querySelector("#zip").required = false; 
        document.querySelector("#phone").required = false;

    } else if (switchElement == "delivery") {                
        choice1.style.display = "block"; 

        document.querySelector("#first-name").required = true; 
        document.querySelector("#sir-name").required = true; 
        document.querySelector("#address").required = true;  
        document.querySelector("#city").required = true; 
        document.querySelector("#state").required = true; 
        document.querySelector("#zip").required = true; 
        document.querySelector("#phone").required = true;
    } else if (switchElement == "cash") {
        choice2.style.display = "none";

    } else if (switchElement == "credit") {
        choice2.style.display = "block";
    }                                
}

$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    $(".testbtn").click(function() {

    });

    allNextBtn.click(function(){        
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});