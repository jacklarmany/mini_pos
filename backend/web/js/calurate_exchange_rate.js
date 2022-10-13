function TotalValue() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_total_value_usd = document.getElementById("input_total_value_usd").value;
    var output_total_value_lak = document.getElementById("output_total_value_lak");
    if (input_exchange !== '' && input_total_value_usd !== '') {
        output_total_value_lak.value = (Math.round(input_total_value_usd * input_exchange)).toFixed(0);
        document.getElementById("output_total_value_lak-disp").value = output_total_value_lak.value;
        $('#output_total_value_lak-disp').val(output_total_value_lak.value).trigger('mask.maskMoney');
    } else {
        output_total_value_lak.value = '';
    }
}

function TotalValueLAK() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_total_value_usd = document.getElementById("input_total_value_usd");
    var output_total_value_lak = document.getElementById("output_total_value_lak").value;
    if (input_exchange !== '' && output_total_value_lak !== '') {
        input_total_value_usd.value = (Math.round(output_total_value_lak / input_exchange)).toFixed(0)
        document.getElementById("input_total_value_usd-disp").value = input_total_value_usd.value;
        $('#input_total_value_usd-disp').val(input_total_value_usd.value).trigger('mask.maskMoney');
    } else {
        input_total_value_usd.value = '';
    }
}

function TotalValueAdjustment() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_total_value_adjustment_usd = document.getElementById("input_total_value_adjustment_usd").value;
    var output_total_value_adjustment_lak = document.getElementById("output_total_value_adjustment_lak");
    if (input_exchange !== '' && input_total_value_adjustment_usd !== '') {
        output_total_value_adjustment_lak.value = (Math.round(input_total_value_adjustment_usd * input_exchange)).toFixed(0)
        document.getElementById("output_total_value_adjustment_lak-disp").value = output_total_value_adjustment_lak.value;
        $('#output_total_value_adjustment_lak-disp').val(output_total_value_adjustment_lak.value).trigger('mask.maskMoney');
    } else {
        output_total_value_adjustment_lak.value = '';
    }
}

function TotalValueAdjustmentLAK() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_total_value_adjustment_usd = document.getElementById("input_total_value_adjustment_usd");
    var output_total_value_adjustment_lak = document.getElementById("output_total_value_adjustment_lak").value;
    if (input_exchange !== '' && output_total_value_adjustment_lak !== '') {
        input_total_value_adjustment_usd.value = (Math.round(output_total_value_adjustment_lak / input_exchange)).toFixed(0)
        document.getElementById("input_total_value_adjustment_usd-disp").value = input_total_value_adjustment_usd.value;
        $('#input_total_value_adjustment_usd-disp').val(input_total_value_adjustment_usd.value).trigger('mask.maskMoney');
    } else {
        input_total_value_adjustment_usd.value = '';
    }
}


function TotalCapital() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_total_capital_usd = document.getElementById("input_total_capital_usd").value;
    var output_total_capital_lak = document.getElementById("output_total_capital_lak");
    if (input_exchange !== '' && input_total_capital_usd !== '') {
        output_total_capital_lak.value = (Math.round(input_total_capital_usd * input_exchange)).toFixed(0)
        document.getElementById("output_total_capital_lak-disp").value = output_total_capital_lak.value;
        $('#output_total_capital_lak-disp').val(output_total_capital_lak.value).trigger('mask.maskMoney');
    } else {
        output_total_capital_lak.value = '';
    }
}

function TotalCapitalLAK() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_total_capital_usd = document.getElementById("input_total_capital_usd");
    var output_total_capital_lak = document.getElementById("output_total_capital_lak").value;
    if (input_exchange !== '' && output_total_capital_lak !== '') {
        input_total_capital_usd.value = (Math.round(output_total_capital_lak / input_exchange)).toFixed(0)
        document.getElementById("input_total_capital_usd-disp").value = input_total_capital_usd.value;
        $('#input_total_capital_usd-disp').val(input_total_capital_usd.value).trigger('mask.maskMoney');
    } else {
        input_total_capital_usd.value = '';
    }
}


function TotalCapitalAdjustment() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_total_capital_adjustment_usd = document.getElementById("input_total_capital_adjustment_usd").value;
    var output_total_capital_adjustment_lak = document.getElementById("output_total_capital_adjustment_lak");
    if (input_exchange !== '' && input_total_capital_adjustment_usd !== '') {
        output_total_capital_adjustment_lak.value = (Math.round(input_total_capital_adjustment_usd * input_exchange)).toFixed(0)
        document.getElementById("output_total_capital_adjustment_lak-disp").value = output_total_capital_adjustment_lak.value;
        $('#output_total_capital_adjustment_lak-disp').val(output_total_capital_adjustment_lak.value).trigger('mask.maskMoney');
    } else {
        output_total_capital_adjustment_lak.value = '';
    }
}

function TotalCapitalAdjustmentLAK() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_total_capital_adjustment_usd = document.getElementById("input_total_capital_adjustment_usd");
    var output_total_capital_adjustment_lak = document.getElementById("output_total_capital_adjustment_lak").value;
    if (input_exchange !== '' && output_total_capital_adjustment_lak !== '') {
        input_total_capital_adjustment_usd.value = (Math.round(output_total_capital_adjustment_lak / input_exchange)).toFixed(0)
        document.getElementById("input_total_capital_adjustment_usd-disp").value = input_total_capital_adjustment_usd.value;
        $('#input_total_capital_adjustment_usd-disp').val(input_total_capital_adjustment_usd.value).trigger('mask.maskMoney');
    } else {
        input_total_capital_adjustment_usd.value = '';
    }
}


function RegisteredCapitalCash() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_registered_capital_cash_usd = document.getElementById("input_registered_capital_cash_usd").value;
    var output_registered_capital_cash_lak = document.getElementById("output_registered_capital_cash_lak");
    if (input_exchange !== '' && input_registered_capital_cash_usd !== '') {
        output_registered_capital_cash_lak.value = (Math.round(input_registered_capital_cash_usd * input_exchange)).toFixed(0)
        document.getElementById("output_registered_capital_cash_lak-disp").value = output_registered_capital_cash_lak.value;
        $('#output_registered_capital_cash_lak-disp').val(output_registered_capital_cash_lak.value).trigger('mask.maskMoney');
    } else {
        output_registered_capital_cash_lak.value = '';
    }
}

function RegisteredCapitalCashLAK() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_registered_capital_cash_usd = document.getElementById("input_registered_capital_cash_usd");
    var output_registered_capital_cash_lak = document.getElementById("output_registered_capital_cash_lak").value;
    if (input_exchange !== '' && output_registered_capital_cash_lak !== '') {
        input_registered_capital_cash_usd.value = (Math.round(output_registered_capital_cash_lak / input_exchange)).toFixed(0)
        document.getElementById("input_registered_capital_cash_usd-disp").value = input_registered_capital_cash_usd.value;
        $('#input_registered_capital_cash_usd-disp').val(input_registered_capital_cash_usd.value).trigger('mask.maskMoney');
    } else {
        input_registered_capital_cash_usd.value = '';
    }
}

function RegisteredCapitalCashAdjustment() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_registered_capital_cash_adjustment_usd = document.getElementById("input_registered_capital_cash_adjustment_usd").value;
    var output_registered_capital_cash_adjustment_lak = document.getElementById("output_registered_capital_cash_adjustment_lak");
    if (input_exchange !== '' && input_registered_capital_cash_adjustment_usd !== '') {
        output_registered_capital_cash_adjustment_lak.value = (Math.round(input_registered_capital_cash_adjustment_usd * input_exchange)).toFixed(0)
        document.getElementById("output_registered_capital_cash_adjustment_lak-disp").value = output_registered_capital_cash_adjustment_lak.value;
        $('#output_registered_capital_cash_adjustment_lak-disp').val(output_registered_capital_cash_adjustment_lak.value).trigger('mask.maskMoney');
    } else {
        output_registered_capital_cash_adjustment_lak.value = '';
    }
}

function RegisteredCapitalCashAdjustmentLAK() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_registered_capital_cash_adjustment_usd = document.getElementById("input_registered_capital_cash_adjustment_usd");
    var output_registered_capital_cash_adjustment_lak = document.getElementById("output_registered_capital_cash_adjustment_lak").value;
    if (input_exchange !== '' && output_registered_capital_cash_adjustment_lak !== '') {
        input_registered_capital_cash_adjustment_usd.value = (Math.round(output_registered_capital_cash_adjustment_lak / input_exchange)).toFixed(0)
        document.getElementById("input_registered_capital_cash_adjustment_usd-disp").value = input_registered_capital_cash_adjustment_usd.value;
        $('#input_registered_capital_cash_adjustment_usd-disp').val(input_registered_capital_cash_adjustment_usd.value).trigger('mask.maskMoney');
    } else {
        input_registered_capital_cash_adjustment_usd.value = '';
    }
}


function RegisteredCapitalEquipment() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_registered_capital_equipment_usd = document.getElementById("input_registered_capital_equipment_usd").value;
    var output_registered_capital_equipment_lak = document.getElementById("output_registered_capital_equipment_lak");
    if (input_exchange !== '' && input_registered_capital_equipment_usd !== '') {
        output_registered_capital_equipment_lak.value = (Math.round(input_registered_capital_equipment_usd * input_exchange)).toFixed(0)
        document.getElementById("output_registered_capital_equipment_lak-disp").value = output_registered_capital_equipment_lak.value;
        $('#output_registered_capital_equipment_lak-disp').val(output_registered_capital_equipment_lak.value).trigger('mask.maskMoney');
    } else {
        output_registered_capital_equipment_lak.value = '';
    }
}

function RegisteredCapitalEquipmentLAK() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_registered_capital_equipment_usd = document.getElementById("input_registered_capital_equipment_usd");
    var output_registered_capital_equipment_lak = document.getElementById("output_registered_capital_equipment_lak").value;
    if (input_exchange !== '' && output_registered_capital_equipment_lak !== '') {
        input_registered_capital_equipment_usd.value = (Math.round(output_registered_capital_equipment_lak / input_exchange)).toFixed(0)
        document.getElementById("input_registered_capital_equipment_usd-disp").value = input_registered_capital_equipment_usd.value;
        $('#input_registered_capital_equipment_usd-disp').val(input_registered_capital_equipment_usd.value).trigger('mask.maskMoney');
    } else {
        input_registered_capital_equipment_usd.value = '';
    }
}


function RegisteredCapitalEquipmentAdjustment() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_registered_capital_equipment_adjustment_usd = document.getElementById("input_registered_capital_equipment_adjustment_usd").value;
    var output_registered_capital_equipment_adjustment_lak = document.getElementById("output_registered_capital_equipment_adjustment_lak");
    if (input_exchange !== '' && input_registered_capital_equipment_adjustment_usd !== '') {
        output_registered_capital_equipment_adjustment_lak.value = (Math.round(input_registered_capital_equipment_adjustment_usd * input_exchange)).toFixed(0)
        document.getElementById("output_registered_capital_equipment_adjustment_lak-disp").value = output_registered_capital_equipment_adjustment_lak.value;
        $('#output_registered_capital_equipment_adjustment_lak-disp').val(output_registered_capital_equipment_adjustment_lak.value).trigger('mask.maskMoney');
    } else {
        output_registered_capital_equipment_adjustment_lak.value = '';
    }
}

function RegisteredCapitalEquipmentAdjustmentLAK() {
    var input_exchange = document.getElementById("input_exchange_rate").value;
    var input_registered_capital_equipment_adjustment_usd = document.getElementById("input_registered_capital_equipment_adjustment_usd");
    var output_registered_capital_equipment_adjustment_lak = document.getElementById("output_registered_capital_equipment_adjustment_lak").value;
    if (input_exchange !== '' && output_registered_capital_equipment_adjustment_lak !== '') {
        input_registered_capital_equipment_adjustment_usd.value = (Math.round(output_registered_capital_equipment_adjustment_lak / input_exchange)).toFixed(0)
        document.getElementById("input_registered_capital_equipment_adjustment_usd-disp").value = input_registered_capital_equipment_adjustment_usd.value;
        $('#input_registered_capital_equipment_adjustment_usd-disp').val(input_registered_capital_equipment_adjustment_usd.value).trigger('mask.maskMoney');
    } else {
        input_registered_capital_equipment_adjustment_usd.value = '';
    }
}

function Exchange() {
    TotalValue();
    TotalValueAdjustment();
    TotalCapital();
    TotalCapitalAdjustment();
    RegisteredCapitalCash()
    RegisteredCapitalCashAdjustment();
    RegisteredCapitalEquipment();
    RegisteredCapitalEquipmentAdjustment();
}