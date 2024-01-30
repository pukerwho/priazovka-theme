var $ = require("jquery");
$(".emoji-question-js").on("click", function(){
  $(".emoji-answer-js").removeClass("hidden");
  $(".emoji-question-js").addClass("hidden");
});