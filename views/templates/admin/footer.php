<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 order-last order-md-first">
        <div class="copyright text-center text-md-start">
          <p class="text-sm">
            Designed and Developed by
            <a href="" rel="nofollow" target="_blank">
              TaCongCuong AKA Vincent
            </a>
          </p>
        </div>
      </div>
      <!-- end col-->
      <div class="col-md-6">
        <div class="terms d-flex justify-content-center justify-content-md-end">
          <a href="#0" class="text-sm">Term & Conditions</a>
          <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</footer>
<!-- ========== footer end =========== -->
</main>

<script src="./public/js/bootstrap.bundle.min.js"></script>
<script src="./public/js/main.js"></script>
<script src="./public/js/app.js"></script>
<?php if (isset($_GET['view']) && $_GET['view'] === 'dashboard'): ?>
  <!-- bar user -->
  <script>
    const ctx = document.getElementById('userbar');
    const tmpUserBar = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    <?php foreach ($userRegister as $value): ?>
      <?php for ($i = 0; $i < 12; $i++) : ?>
        <?php if ($value['Time'] === $i + 1): ?>
          tmpUserBar[<?= $i ?>] = <?= $value['SL'] ?>;
        <?php else: ?>
        <?php endif; ?>
      <?php endfor; ?>
    <?php endforeach; ?>
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        datasets: [{
          label: 'User Register',
          data: tmpUserBar,
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          tooltip: {
            mode: 'index',
            intersect: false
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <!-- line user -->
  <script>
    const userLine = document.getElementById('userline');
    const tmpUserLine = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    <?php foreach ($userRegister as $value): ?>
      <?php for ($i = 0; $i < 12; $i++) : ?>
        <?php if ($value['Time'] === $i + 1): ?>
          tmpUserLine[<?= $i ?>] = <?= $value['SL'] ?>;
        <?php else: ?>
        <?php endif; ?>
      <?php endfor; ?>
    <?php endforeach; ?>
    new Chart(userline, {
      type: 'line',
      data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        datasets: [{
          label: 'User Register',
          data: tmpUserLine,
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            mode: 'index',
            intersect: false
          }
        }
      }
    });
  </script>
  <!-- line order-->
  <script>
    const orderLine = document.getElementById('orderline');
    const tmpOrderLine = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    <?php foreach ($orderBuy as $value): ?>
      <?php for ($i = 0; $i < 12; $i++) : ?>
        <?php if ($value['Time'] === $i + 1): ?>
          tmpOrderLine[<?= $i ?>] = <?= $value['SL'] ?>;
        <?php else: ?>
        <?php endif; ?>
      <?php endfor; ?>
    <?php endforeach; ?>
    new Chart(orderLine, {
      type: 'line',
      data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        datasets: [{
          label: 'ORDER',
          data: tmpOrderLine,
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            mode: 'index',
            intersect: false
          }
        }
      }
    });
  </script>
  <!-- bar order -->
  <script>
    const orderBar = document.getElementById('orderbar');
    const tmporderBar = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    <?php foreach ($orderBuy as $value): ?>
      <?php for ($i = 0; $i < 12; $i++) : ?>
        <?php if ($value['Time'] === $i + 1): ?>
          tmporderBar[<?= $i ?>] = <?= $value['SL'] ?>;
        <?php else: ?>
        <?php endif; ?>
      <?php endfor; ?>
    <?php endforeach; ?>
    new Chart(orderBar, {
      type: 'bar',
      data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        datasets: [{
          label: 'ORDER',
          data: tmporderBar,
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          tooltip: {
            mode: 'index',
            intersect: false
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <!-- line money-->
  <script>
    const moneyLine = document.getElementById('moneyline');
    const tmpMoneyLine = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    <?php foreach ($moneyBuy as $value): ?>
      <?php for ($i = 0; $i < 12; $i++) : ?>
        <?php if ($value['Time'] === $i + 1): ?>
          tmpMoneyLine[<?= $i ?>] = <?= $value['SL'] ?>;
        <?php else: ?>
        <?php endif; ?>
      <?php endfor; ?>
    <?php endforeach; ?>
    new Chart(moneyLine, {
      type: 'line',
      data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        datasets: [{
          label: 'Money',
          data: tmpMoneyLine,
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            mode: 'index',
            intersect: false
          }
        }
      }
    });
  </script>
  <!-- bar money -->
  <script>
    const moneyBar = document.getElementById('moneybar');
    const tmpMoneyBar = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    <?php foreach ($moneyBuy as $value): ?>
      <?php for ($i = 0; $i < 12; $i++) : ?>
        <?php if ($value['Time'] === $i + 1): ?>
          tmpMoneyBar[<?= $i ?>] = <?= $value['SL'] ?>;
        <?php else: ?>
        <?php endif; ?>
      <?php endfor; ?>
    <?php endforeach; ?>
    new Chart(moneyBar, {
      type: 'bar',
      data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        datasets: [{
          label: 'MONEY',
          data: tmpMoneyBar,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          tooltip: {
            enabled: true, // Bật tooltips
            mode: 'index', // Khi hover vào cột, hiển thị tooltip của tất cả các bộ dữ liệu tại vị trí đó
            intersect: false, // Tooltip sẽ xuất hiện ngay cả khi bạn hover ngoài phần tử
            callbacks: {
              // Tuỳ chỉnh giá trị hiển thị trong tooltip
              label: function(tooltipItem) {
                return 'Value: ' + tooltipItem.raw; // Hiển thị giá trị dữ liệu
              }
            }
          }
        }
      }
    });
  </script>
<?php endif; ?>

</body>

</html>