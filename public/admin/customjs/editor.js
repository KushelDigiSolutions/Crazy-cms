$(document).ready(function () {
    // Access the iframe
    var iframe = $("#myIframe").contents();
  
    // Function to show the Duplicate button
    function showDuplicateButton(element) {
      // Remove any existing duplicate button to avoid duplicates
      $(".duplicate-btn").remove();
  
      // Create the Duplicate button
      var duplicateButton = $("<button>")
        .text("Duplicate")
        .addClass("duplicate-btn")
        .css({
          position: "absolute",
          zIndex: 9999,
          backgroundColor: "#FF9800",
          color: "#FFF",
          border: "none",
          padding: "5px 10px",
          cursor: "pointer",
          borderRadius: "4px",
        })
        .on("click", function () {
          var clonedElement = element.clone(true); // Clone the current element
          clonedElement.insertAfter(element); // Insert the clone after the current element
        });
  
      // Ensure the element has a position of relative to properly position the button
      if (element.css("position") === "static") {
        element.css("position", "relative");
      }
  
      // Append the button to the element and position it at the top-left
      element.append(duplicateButton);
      duplicateButton.css({
        top: "10px",
        left: "10px",
      });
    }
  
    // Block all link elements inside the iframe and open modal on click
    iframe.find("a").on("click", function (event) {
      event.preventDefault(); // Prevent default click action
  
      var linkElement = $(this); // Get the clicked link element
  
      // Open the modal
      $("#linkEditModal").modal("show");
  
      // Populate the modal fields with current link data
      $("#linkText").val(linkElement.text());
      $("#linkUrl").val(linkElement.attr("href"));
      $("#linkTarget").val(linkElement.attr("target") || "_self"); // Default to '_self' if no target attribute
  
      // Save changes when the "Save changes" button is clicked
      $("#saveLinkButton")
        .off("click")
        .on("click", function () {
          // Update the link's text, URL, and target based on the modal input
          linkElement.text($("#linkText").val());
          linkElement.attr("href", $("#linkUrl").val());
          linkElement.attr("target", $("#linkTarget").val());
  
          // Close the modal
          $("#linkEditModal").modal("hide");
        });
    });
  
    // Allow editing of text elements inside the iframe
    iframe.find("body").on("click", "*", function (event) {
      event.stopPropagation(); // Prevent event bubbling
      var element = $(this);
  
      // If the element is not already editable, make it editable
      if (!element.attr("contenteditable")) {
        element.attr("contenteditable", "true").focus();
      }
    });
  
    // Add hover effect with border to text, images, and link elements inside the iframe
    iframe
      .find("body")
      .on(
        "mouseover",
        "p, a, span, img, h1, h2, h3, h4, h5, h6, div",
        function () {
          $(this).css("outline", "2px dashed #FFA500"); // Add a dashed orange border
          showDuplicateButton($(this)); // Show the duplicate button on hover
        }
      );
  
    iframe
      .find("body")
      .on(
        "mouseout",
        "p, a, span, img, h1, h2, h3, h4, h5, h6, div",
        function () {
          $(this).css("outline", ""); // Remove the border
          $(".duplicate-btn").remove(); // Remove the duplicate button when mouse out
        }
      );
  
    // Show the duplicate button on hover of slick-slide elements
    $(".slick-slide").hover(
      function () {
        // On mouse enter, show the duplicate button
        showDuplicateButton($(this));
      },
      function () {
        // On mouse leave, remove the duplicate button
        $(".duplicate-btn").remove();
      }
    );
  });
  