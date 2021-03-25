$(function(){

  let count = 4;
  let addData = 0;
  let allData =  [];

  $('.appBoxes').masonry({
    // options
    itemSelector: '.appBox',
    columnWidth: '.appBox-sizer',
    percentPosition: true
  });

  $.getJSON("/gold/data/json/app.json", initAppData);

  function initAppData(data){
    allData = data;
    addAppData();

    $(".appLoadMore").on("click", addAppData);
  }

  function addAppData(){
    //console.log(data[0].appclient);
    let items = [];  
    let slicedData = allData.slice(addData, addData + count);
    $.each(slicedData, function(i, item){
      //console.log(item);
      let itemHTML = `<div class="appBox">
                      <div>
                        <img src="/gold/data/app_page/app_thumb/${item.appthumb}" alt="">
                        <h2>${item.apptitle}</h2>
                        <a href="/gold/pages/app/app_detail.php?num=${item.appnum}">View Details</a>
                      </div>
                    </div>`;
      items.push($(itemHTML).get(0));
    });

    $(".appBoxes").append(items);

    $(".appBoxes").imagesLoaded(function(){
      //$(items).removeClass("is-loading");
      $(".appBoxes").masonry('appended', items);
    });

    addData += slicedData.length;
  }
});
