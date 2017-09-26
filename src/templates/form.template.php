  <div id="order-form-container">
  </div>
  <script type="text/javascript">
    window.app = window.app || {};
    window.app.data = <?php echo json_encode($this->datas) ?>;
    window.app.chosenProduct = window.location.search.substr(1);
  </script>
