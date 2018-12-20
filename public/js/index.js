$('.card__inner').on('click', function(){
  console.log(this);

  window.location = $(this).data('link');
})
