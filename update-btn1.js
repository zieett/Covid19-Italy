$(document).on("click", ".update-btn", async function () {
    console.log($(this).parent().parent().find(".name").text());
    let name = $(this).parent().parent().find(".name").text();
    let province = $(this).parent().parent().find(".province").text();
    let capacity = $(this).parent().parent().find(".capacity").text();
    let data = await $.ajax({
        url: "https://abcsadq.de.r.appspot.com/question1/getDataForUpdate1.php",
        method: "POST",
        data: {
            name: name,
            province: province,
            capacity: capacity,
            url: url,
        },
    });
    // console.log(JSON.stringify(data));
    // console.log(JSON.parse(data));
    $(".updated").modal("show");
    data = JSON.parse(data);
    console.log(data);

    $("#formNameUpdate").val(data[0]);
    $("#formSubTypeUpdate").val(data[1]);
    $("#formCurrentStatusUpdate").val(data[2]);
    $("#formCapacityUpdate").val(data[3]);
    $("#formYearOfCompletionUpdate").val(data[4]);
    $("#formCountryListOfSponsorUpdate").val(data[6]);
    $("#formSponsorUpdate").val(data[7]);
    $("#formCountryListOfLenderUpdate").val(data[8]);
    $("#formLenderUpdate").val(data[9]);
    $("#formCountryListOfConstructionUpdate").val(data[10]);
    $("#formConstructionUpdate").val(data[11]);
    $("#formCountryUpdate").val(data[12]);
    $("#formProvinceUpdate").val(data[13]);
    $("#formDistrictUpdate").val(data[14]);
    $("#formTributaryUpdate").val(data[16]);
    $("#formLongitudeUpdate").val(data[18]);
    $("#formLatitudeUpdate").val(data[17]);
    $("#formProximityUpdate").val(data[19]);
    $("#formAnnualUpdate").val(data[20]);
    $("#formDataSourceUpdate").val(data[22]);
    $("#formLinkUpdate").val(data[23]);
    $("#formAnnouncementUpdate").val(data[24]);
    $("#formLatestUpdateUpdate").val(data[25]);
});
