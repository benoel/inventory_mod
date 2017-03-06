$(document).scannerDetection({  
  //https://github.com/kabachello/jQuery-Scanner-Detection
  timeBeforeScanTest: 200, // wait for the next character for upto 200ms
  avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
  preventDefault: true,
  endChar: [13],
  onComplete: function(barcode, qty){
    validScan = true;
    // $("#product-lis  t").append("<li>" + barcode + "</li>");
    $.ajax({
      type: "GET",
      dataType: "json",
      cache: false,
      url: '/barang/'+barcode,
      success: function(data){
        for(var i in data){
          console.log(data[i].name);
        }
      }
    })
    .done(function(data){
      console.log(data);
      console.log(window.trancType);
    });
  }, // main callback function ,
  onError: function(string, qty) {
    // $('#userInput').val ($('#userInput').val() + string);
    console.log(string);
  }
});