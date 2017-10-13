  <div id="order-form-container">
  </div>
  <script type="text/javascript">
    window.app = window.app || {};
    window.app.data = <?php echo json_encode($this->datas) ?>;
    window.app.chosenProduct = window.location.search.substr(1);
    window.app.deliveryOptions = [
        {
          id: 'personal',
          label: 'Odbiór Osobisty',
          tresholds: [-1]
        },
        {
          id: 'post24',
          label: 'Poczta, Paczka24',
          tresholds: [20000, 10000, 5000, 2000, 500],
          values: [27, 22, 18, 16, 12.5]
        },
        {
          id: 'post48',
          label: 'Poczta, Paczka48',
          tresholds: [20000, 10000, 5000, 2000, 500],
          values: [25.5, 20.5, 16.5, 14.5, 11]
        }
      ];
  </script>
