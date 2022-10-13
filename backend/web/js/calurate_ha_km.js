function ConverHatoKm() {
    var area_ha = document.getElementById("input_area_ha").value;
    var area_km = document.getElementById("input_area_km");
    if (area_ha !== '') {
        area_km.value = (area_ha * 0.01).toFixed(2);
    } else {
        area_km.value = '';
    }
}

function ConverKmtoHa() {
    var area_ha = document.getElementById("input_area_ha");
    var area_km = document.getElementById("input_area_km").value;
    if (area_km !== '') {
        area_ha.value = (area_km/0.01);
    } else {
        area_ha.value = '';
    }
}