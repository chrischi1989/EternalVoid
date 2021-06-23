function getMultiplier($bonus, $researchLevel) {
    return 1 + (($bonus + ($researchLevel * 5)) / 100);
}

function nf(number, shorten = true, length = 0, decimal_separator = '', thousands_separator = '.') {
    number = Math.round(number * Math.pow(10, length)) / Math.pow(10, length);

    var arr_int=String(number).split(".");
    if(!arr_int[0]) arr_int[0] = "0";
    if(!arr_int[1]) arr_int[1] = "";
    if(arr_int[1].length < length) {
        var decimal = arr_int[1];
        for(var i = arr_int[1].length + 1;i <= length; i++) {
            decimal += "0";
        }

        arr_int[1] = decimal;
    }

    if(thousands_separator !== "" && arr_int[0].length > 3) {
        var thousands = arr_int[0];
        arr_int[0] = "";
        for(var j = 3;j < thousands.length;j += 3) {
            var part = thousands.slice(thousands.length - j, thousands.length - j + 3);
            arr_int[0] = String(thousands_separator + part + arr_int[0]);
        }

        var str_first = thousands.substr(0, (thousands.length % 3 === 0) ? 3 : (thousands.length % 3));
        arr_int[0] = str_first+arr_int[0];
    }

    console.log(arr_int[0]);

    return arr_int[0] + decimal_separator + arr_int[1];
}

window.setInterval(function() {
    if ($data.resources.aluminium + $data.resources.titan + $data.resources.silizium <= $data.capacity.lager) {
        $data.resources.aluminium += $data.production.aluminium;
        $data.resources.titan     += $data.production.titan;
        $data.resources.silizium  += $data.production.silizium;
        $data.filled.lager         = (($data.resources.aluminium + $data.resources.titan + $data.resources.silizium) / $data.capacity.lager) * 100;
    }

    if ($data.resources.arsen + $data.resources.wasserstoff <= $data.capacity.speziallager) {
        $data.resources.arsen       += $data.production.arsen;
        $data.resources.wasserstoff += $data.production.wasserstoff;
        $data.filled.speziallager    = (($data.resources.arsen + $data.resources.wasserstoff) / $data.capacity.speziallager) * 100;
    }

    if ($data.resources.antimaterie <= $data.capacity.tanks) {
        $data.resources.antimaterie += $data.production.antimaterie;
        $data.filled.tanks           = ($data.resources.antimaterie / $data.capacity.tanks) * 100;
    }

    //document.querySelector('.aluminium.amount').innerHTML = nf($data.resources.aluminium);
    //document.querySelector('.titan.amount').innerHTML = nf($data.resources.titan);
    //document.querySelector('.silizium.amount').innerHTML = nf($data.resources.silizium);
    //document.querySelector('.arsen.amount').innerHTML = nf($data.resources.arsen);
    //document.querySelector('.wasserstoff.amount').innerHTML = nf($data.resources.wasserstoff);
    //document.querySelector('.antimaterie.amount').innerHTML = nf($data.resources.antimaterie);
    //document.querySelector('.lager.amount').innerHTML = nf($data.filled.lager, 2, ',') + '%';
    //document.querySelector('.speziallager.amount').innerHTML = nf($data.filled.speziallager, 2, ',') + '%';
    //document.querySelector('.tanks.amount').innerHTML = nf($data.filled.tanks, 2, ',') + '%';
}, 1000);
