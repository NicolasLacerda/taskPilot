$(".navbar-toggler").on("click", function lateralCards() {
  let aberto = true;

  if (aberto) {
    $(".lateral-cards").animate(
      {
        width: "0%",
        paddingLeft: "0px",
        paddingRight: "0px",
        paddingTop: "0px",
        paddingBottom: "0px",
      },
      400
    );
  } else {
    $(".lateral-cards").animate(
      {
        width: "30%",
        paddingLeft: "20px",
        paddingRight: "20px",
        paddingTop: "20px",
        paddingBottom: "20px",
      },
      400
    );
  }
  aberto = !aberto;
});

$(".add-card").on("click", function addCard() {
  $(".cards-board").append("<div class='card'>teste</div>");
});
