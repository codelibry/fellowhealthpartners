import $ from "jquery";

function numberBlock() {
  $(document).ready(function () {
    // Add the "active" class to the first block initially
    $(".number_blocks__main .vertical_block:first").addClass("active");

    $(".number_blocks__main .vertical_block").on("click", function () {
      // Знайдіть активний блок і заберіть клас "active"
      var activeBlock = $(".number_blocks__main .vertical_block.active");
      activeBlock.removeClass("active");

      // Знайдіть блок, який було клікнуто і додайте до нього клас "active"
      $(this).addClass("active");

      // Перемикаємо відображення блоків у поточному та активному блоках
      $(".number", activeBlock).show();
      $(".title", activeBlock).show();
      $(".bg--white", activeBlock).show();
      $(".content", activeBlock).hide();
      $(".title_active", activeBlock).hide();

      $(".number", this).hide();
      $(".title", this).hide();
      $(".bg--white", this).hide();
      $(".content", this).show();
      $(".title_active", this).show();
    });
  });
}
export { numberBlock };
