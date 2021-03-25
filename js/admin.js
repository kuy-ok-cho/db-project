$(function(){
  // admin page main tabs
  const adminTab = function(){
    $(".adminTabs button").click(function(){

      let tabIndex = $(this).index();

      $(".adminTabs button").removeClass("active");
      $(this).addClass("active");
      
      $(".adminPanel").hide();
      $(".adminPanel").eq(tabIndex).show();
    });
    $(".adminTabs button").eq(0).trigger("click");
  };
  adminTab();
});