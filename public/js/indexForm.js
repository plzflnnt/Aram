$(document).on("click", ".single-item", function(e){
  var container = $(".form-container"),
      el = $(e.target),
      elParent = el.closest(".single-item");
  
  function elClassSwitcher(el, a, b){
    el.addClass(a).removeClass(b);
  }
  
  function addNewItem(callback){
    var newItem = $('<div class="single-item" style="display: none;opacity: 0;"><div class="left"><input type="text" /></div><div class="right"><a class="single-item-trigger add" href="#"></a></div></div>');
    container.append(newItem);
    newItem.slideDown(function(){
      $(this).animate({opacity: 1}, function(){
        if ( typeof(callback) === "function" ){
          return(callback());
        }
      });
    });	
  }
  
  function removeItem(callback){
    elParent.animate({opacity: 0}, function(){
      $(this).slideUp(function(){
        $(this).remove();
        if ( typeof(callback) === "function" ){
          return(callback());
        }
      });
    })
  }
  
  if( el.hasClass("single-item-trigger") ){
    if( el.hasClass("add") ){
      console.log("aa");
      addNewItem();
      elClassSwitcher(el, "remove", "add");
    } else if( el.hasClass("remove") ){
      removeItem();
    }
  }
  
});