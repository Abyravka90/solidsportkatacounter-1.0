<?php
include 'config/database.php';
include 'assets/_partials/head.php';
$sql_technic = "SELECT nilai_technic FROM `point` ORDER BY nilai_technic DESC LIMIT 3";
$sql_athletic = "SELECT nilai_athletic FROM `point` ORDER BY nilai_athletic DESC LIMIT 3";
?>
<!-- Masthead -->
<style>
  @font-face {
    font-family: "digital-7";
    src: url('digital-7.TTF');
  }

  #digital {
    font-family: "digital-7"
  }

  body {
    overflow: hidden;
    /* Hide scrollbars */
  }

  .display__time-left {
    font-weight: 1600;
    font-size: 90rem;
    margin: 0;
    color: Black;
    text-shadow: 4px 4px 0 rgba(0, 0, 0, 0.05);
  }

  .display {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
</style>
<header class="masthead" id="masthead">
  <h1>
    <marquee class="text-black" bgcolor="#ffffff" id="arena" onmouseover="this.stop()" behavior="alternate" onmouseout="this.start()"></marquee>
  </h1>
  <br><br>
  <div class="row">
    <div class="col-md-5">
      <div class="container">
        <div class="card text-center" style="background:#000;">
          <div class="card-body" style="background:#000;">
            <button data-time="300" class="btn btn-light">Start Time</button>
            <button class="btn btn-danger text-white" onclick="clearInterval(countdown);">Stop Timer</button>
            <h6 class="text-uppercase text-white font-weight-bold" style="font-size:50;">- Pertandingan Beregu - </h6>
            <div class="display">
              <h1 class="display__time-left" id="digital" style="font-weight: 100px;font-size: 10rem;margin: 0;color:Red;text-shadow:4px 4px 0 rgba(0,0,0,0.05);"></h1>
              <p class="display__end-time"></p>
            </div>
          </div>
        </div>
        <br>
      </div>

    </div>
    <div class="col-md-7 ">
      <div class="container">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;<img src="assets/img/solid.png" height="300px" width="500px" alt="solid sports organizer"></img><br>
        <div class="card text-center">
          <div class="card-header">
            <div class="text-uppercase text-white font-weight-bold" style="font-size:100;" id="nama_atlet"></div>
          </div>
          <div class="card-body">
            <h2 class="text-uppercase text-black font-weight-bold" id="kata_dimainkan"></h2>
          </div>
          <div class="card-footer text-muted">
            <h2 class="text-uppercase text-black font-weight-bold" id="kontingen"> </h2>
          </div>
        </div>
		<br>
		<form action="tabel_point_beregu.php" method="get">
        <div id="pertandingan_ke"></div>
        <input type="submit" class="form-group btn btn-danger" value="Rekapitulasi Poin Tatami">
      </form>
      </div>
      <br>
    </div>
  </div>

<?php include 'assets/_partials/footer.php'; ?>
</header>


<script>
  let countdown;
  const timerDisplay = document.querySelector('.display__time-left');
  const endTime = document.querySelector('.display__end-time');
  const buttons = document.querySelectorAll('[data-time]');

  function timer(seconds) {
    // clear any existing timers
    clearInterval(countdown);

    const now = Date.now();
    const then = now + seconds * 1000;
    displayTimeLeft(seconds);
    displayEndTime(then);

    countdown = setInterval(() => {
      const secondsLeft = Math.round((then - Date.now()) / 1000);
      // check if we should stop it!
      if (secondsLeft < 0) {
        clearInterval(countdown);
        return;
      }
      // display it
      displayTimeLeft(secondsLeft);
    }, 1000);
  }

  function displayTimeLeft(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainderSeconds = seconds % 60;
    const display = `${ minutes }:${ remainderSeconds < 10 ? '0' : '' }${ remainderSeconds }`;
    ``
    document.title = display;
    timerDisplay.textContent = display;
  }

  function displayEndTime(timestamp) {
    const end = new Date(timestamp);
    const hour = end.getHours();
    const minutes = end.getMinutes();
  }

  function startTimer() {
    const seconds = parseInt(this.dataset.time);
    timer(seconds);
	
  }
  

  buttons.forEach(button => button.addEventListener('click', startTimer));
</script>