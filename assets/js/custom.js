

!function ($) {
    $(document).on("click","ul.nav li.parent > a ", function(){          
        $(this).find('em').toggleClass("fa-minus");      
    }); 
    $(".sidebar span.icon").find('em:first').addClass("fa-plus");
}

(window.jQuery);
	$(window).on('resize', function () {
  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
})
$(window).on('resize', function () {
  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
})

$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-up').addClass('fa-toggle-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-down').addClass('fa-toggle-up');
	}
})


    // 'Bfrtip',
    $(document).ready(function() {
      $('.table-data').DataTable({
        order: [],
        dom: '<"top"<"left-col"B><"center-col"><"right-col"f>> <"row"<"col-sm-12"tr>><"row"<"col-sm-4"l><"col-sm-8"p>>',
        buttons: [{
            extend: 'copy',
            exportOptions: {
              columns: 'th:not(:last-child)'
            }
          },
          {
            extend: 'csv',
            exportOptions: {
              columns: 'th:not(:last-child)'
            }
          },
          {
            extend: 'excel',
            exportOptions: {
              columns: 'th:not(:last-child)'
            }
          },
          {
            extend: 'pdf',
            exportOptions: {
              columns: 'th:not(:last-child)'
            }
          }
        ]
      });
    });

    $("table").on("change keydown keypress keyup", "input", function() {
      var row = $(this).closest("tr");
      var qty = parseFloat((row.find(".qty").val() != "") ? row.find(".qty").val() : 0);
      var price = parseFloat((row.find(".price").val() != "") ? row.find(".price").val() : 0);
      var discount = parseFloat((row.find(".discount").val() != "") ? row.find(".discount").val() : 0);
      var total = (qty * price) - discount;
      row.find(".rowtotal").val(isNaN(total) ? "" : total);
      Calculate();
    });

    function Calculate() {
      var subQty = 0;
      var subTotalPrice = 0;
      var subTotalDiscount = 0;
      var subTotal = 0;
      $('.qty').each(function() {
        subQty += parseFloat((this.value != "") ? this.value : 0)
      });
      $('.price').each(function() {
        subTotalPrice += parseFloat((this.value != "") ? this.value : 0)
      });
      $('.discount').each(function() {
        subTotalDiscount += parseFloat((this.value != "") ? this.value : 0)
      });
      $('.rowtotal').each(function() {
        subTotal += parseFloat((this.value != "") ? this.value : 0)
			});
			$('#subTotalQty').text(isNaN(subQty) ? "" : subQty);
      $('#subTotalPrice').text(isNaN(subTotalPrice) ? "" : subTotalPrice);
      $('#subTotalDiscount').text(isNaN(subTotalDiscount) ? "" : subTotalDiscount);
      $('#subTotal').text(isNaN(subTotal) ? "" : subTotal);

      grandTotal = subTotalPrice + subTotalDiscount + subTotal;
      $('#totalGrand').text(isNaN(grandTotal) ? "" : grandTotal);
    }


    $(function() {
      $('.date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
				autoApply: true,
				autoUpdateInput: true,
				"locale": {
					"format": "YYYY-MM-DD",
				}
      }, function(start, end, label) {
      });
    });
