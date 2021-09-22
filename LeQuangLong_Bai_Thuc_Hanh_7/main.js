$(document).ready(function () {
    var chot = 0;
    var showed = 0;
    var number1 = "";
    var number2 = "";
    var PhepToan = "";
    var variableOld = "";
    $("td").click(function (e) {
        var variable = $(this).html();
        if (variable == "Clear") {
            $("#in").val("");
            chot = 0;
            showed = 0;
            number1 = "";
            number2 = "";
            PhepToan = "";
            variableOld = "";
        } else {
            variableOld = variableOld + variable;
            $("#in").val(variableOld);
        }

        if (variable >= "0" && variable <= "9" || variable == ".") {
            if (showed == 1) {
                variableOld = variable;
                $("#in").val(variableOld);
                number1 = variableOld;
                showed = 0;
                chot = 0;
            } else {
                if (chot == 0) {
                    number1 = number1 + variable;
                } else {
                    number2 = number2 + variable;
                }
            }
        } else {
            if (variable == "+" || variable == "-" || variable == "x" || variable == "/") {
                chot = 1;
                PhepToan = variable;
                showed = 0;
            }
            if (variable == "=") {
                // number1 = parseInt(number1);
                // number2 = parseInt(number2);
                // alert(number1+"=>>>>"+number2);
                $.post("ajax.php", { a: number1, b: number2, call: PhepToan }, function (data) {
                    $("#in").val(data);
                    variableOld = data;
                    number1 = data;
                    number2 = "";
                    showed = 1;
                });
            }
        }
    });
});