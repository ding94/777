$(document).ready(function(){
    if($("#usedTime").val() >= 5 || $("#token") == '0')
    {
        $("#btnSubmit").prop('disabled', true);
        $("#value").prop('disabled', true);
    }
})

function enterValue(userInput)
{
  var input = parseInt(userInput);
  var minValue = parseInt(document.getElementById("min").innerHTML.trim());
  var maxValue = parseInt(document.getElementById("max").innerHTML.trim());
  if (input <= minValue || input >= maxValue) 
  {
    alert("Please enter number between "+ minValue + " to " + maxValue +" !");
  }else{
    $.ajax({
    url: "index.php?r=inbetween/index",
    type: "post",
    data : {
        record: userInput,
        _csrf: '<?=Yii::$app->request->getCsrfToken()?>',
    },
   success: function (data) {
      console.log(data.search);
      $("#min").toggleClass('bounceInLeft');
      $("#max").toggleClass('bounceInRight');
      getVal();
   },

   error: function (request, status, error) {
    alert(request.responseText);
    }
});
  }
}



function getVal(){
  $.ajax({
    url: "index.php?r=inbetween/getinput",
    type: "get",
    data : {
        _csrf: '<?=Yii::$app->request->getCsrfToken()?>',
    },
   success: function (data) {
    var result = JSON.parse(data);
      console.log(result);
      if (result.token==0) {
//       if (document.getElementById("mid").innerHTML = result.ans) {
//         document.body.appendChild(canvas);
//         canvas.width = SCREEN_WIDTH;
//         canvas.height = SCREEN_HEIGHT;
//         var startTime = new Date().getTime();
//         var interval = setInterval(function(){ launch();
//         if(new Date().getTime() - startTime > 10000){
//         clearInterval(interval);
//         $('canvas').fadeOut('2000');
//         return;
//     }
// }, 100);
//         var interval1 = setInterval(function(){ loop();
//         if(new Date().getTime() - startTime > 10000){
//         clearInterval(interval1);
//         $('canvas').fadeOut('2000');
//         return;
//     }
// }, 1500 / 50);
//       }
            $("#btnSubmit").prop('disabled', true);
            $("#value").prop('disabled', true);
          document.getElementById("value").value = "";
          document.getElementById("mid").innerHTML = result.ans;
          document.getElementById("min").innerHTML = "";
          document.getElementById("max").innerHTML = "";
          document.getElementById("top").innerHTML = "Congratulations! You have won our price!";
          document.getElementById("times").innerHTML = "Your chances today had finished. Please come again tomorrow.";


      }else{
        document.getElementById("value").value = "";
        //document.getElementById("min").innerHTML = result.min_value;
        document.getElementById("mid").innerHTML = "to";
        $("#min").text(result.min_value).addClass('bounceInLeft');
       // document.getElementById("max").innerHTML = result.max_value;
        $("#max").text(result.max_value).addClass('bounceInRight');
        if (result.usedTime >= 5) { 
            $("#btnSubmit").prop('disabled', true);
            $("#value").prop('disabled', true);
          document.getElementById("top").innerHTML = "Game End";
          document.getElementById("times").innerHTML = "Your chances today had finished. Please come again tomorrow.";
      }
      else {
       document.getElementById("times").innerHTML = "You have "+(5 - result.usedTime)+" chances left.";
      }

    }
   },

   error: function (request, status, error) {
    alert(request.responseText);
    }
});
}

$('#value').keypress(function(e){
  if(e.which == 13)
  {
    enterValue($(this).val());
  }

});

/*----------------------------------------------------Fireworks Test----------------------------------------------------------------------*/

var SCREEN_WIDTH = window.innerWidth,
    SCREEN_HEIGHT = window.innerHeight,
    mousePos = {
        x: 400,
        y: 300
    },

    // create canvas
    canvas = document.createElement('canvas'),
    context = canvas.getContext('2d'),
    particles = [],
    rockets = [],
    MAX_PARTICLES = 400,
    colorCode = 0;

// init
// $(document).ready(function() {
    
// });

// update mouse position
$(document).mousemove(function(e) {
    e.preventDefault();
    mousePos = {
        x: e.clientX,
        y: e.clientY
    };
});

// launch more rockets!!!
$(document).mousedown(function(e) {
    for (var i = 0; i < 5; i++) {
        launchFrom(Math.random() * SCREEN_WIDTH * 2 / 3 + SCREEN_WIDTH / 6);
    }
});

function launch() {
    launchFrom(mousePos.x);
}

function launchFrom(x) {
    if (rockets.length < 10) {
        var rocket = new Rocket(x);
        rocket.explosionColor = Math.floor(Math.random() * 360 / 10) * 10;
        rocket.vel.y = Math.random() * -3 - 4;
        rocket.vel.x = Math.random() * 6 - 3;
        rocket.size = 8;
        rocket.shrink = 0.999;
        rocket.gravity = 0.01;
        rockets.push(rocket);
    }
}

function loop() {
    // update screen size
    if (SCREEN_WIDTH != window.innerWidth) {
        canvas.width = SCREEN_WIDTH = window.innerWidth;
    }
    if (SCREEN_HEIGHT != window.innerHeight) {
        canvas.height = SCREEN_HEIGHT = window.innerHeight;
    }
    context.font = "100px Arial";
    context.fillStyle = "white";
    context.textAlign = "center";
    context.fillText("Congratulations", canvas.width/2, canvas.height/2);
    // clear canvas
    context.fillStyle = "rgba(0, 0, 0, 0.08)";
    context.fillRect(0, 0, SCREEN_WIDTH, SCREEN_HEIGHT);

    var existingRockets = [];

    for (var i = 0; i < rockets.length; i++) {
        // update and render
        rockets[i].update();
        rockets[i].render(context);

        // calculate distance with Pythagoras
        var distance = Math.sqrt(Math.pow(mousePos.x - rockets[i].pos.x, 2) + Math.pow(mousePos.y - rockets[i].pos.y, 2));

        // random chance of 1% if rockets is above the middle
        var randomChance = rockets[i].pos.y < (SCREEN_HEIGHT * 2 / 3) ? (Math.random() * 100 <= 1) : false;

/* Explosion rules
             - 80% of screen
            - going down
            - close to the mouse
            - 1% chance of random explosion
        */
        if (rockets[i].pos.y < SCREEN_HEIGHT / 5 || rockets[i].vel.y >= 0 || distance < 50 || randomChance) {
            rockets[i].explode();
        } else {
            existingRockets.push(rockets[i]);
        }
    }

    rockets = existingRockets;

    var existingParticles = [];

    for (var i = 0; i < particles.length; i++) {
        particles[i].update();

        // render and save particles that can be rendered
        if (particles[i].exists()) {
            particles[i].render(context);
            existingParticles.push(particles[i]);
        }
    }

    // update array with existing particles - old particles should be garbage collected
    particles = existingParticles;

    while (particles.length > MAX_PARTICLES) {
        particles.shift();
    }
}

function Particle(pos) {
    this.pos = {
        x: pos ? pos.x : 0,
        y: pos ? pos.y : 0
    };
    this.vel = {
        x: 0,
        y: 0
    };
    this.shrink = .97;
    this.size = 2;

    this.resistance = 1;
    this.gravity = 0;

    this.flick = false;

    this.alpha = 1;
    this.fade = 0;
    this.color = 0;
}

Particle.prototype.update = function() {
    // apply resistance
    this.vel.x *= this.resistance;
    this.vel.y *= this.resistance;

    // gravity down
    this.vel.y += this.gravity;

    // update position based on speed
    this.pos.x += this.vel.x;
    this.pos.y += this.vel.y;

    // shrink
    this.size *= this.shrink;

    // fade out
    this.alpha -= this.fade;
};

Particle.prototype.render = function(c) {
    if (!this.exists()) {
        return;
    }

    c.save();

    c.globalCompositeOperation = 'lighter';

    var x = this.pos.x,
        y = this.pos.y,
        r = this.size / 2;

    var gradient = c.createRadialGradient(x, y, 0.1, x, y, r);
    gradient.addColorStop(0.1, "rgba(255,255,255," + this.alpha + ")");
    gradient.addColorStop(0.8, "hsla(" + this.color + ", 100%, 50%, " + this.alpha + ")");
    gradient.addColorStop(1, "hsla(" + this.color + ", 100%, 50%, 0.1)");

    c.fillStyle = gradient;

    c.beginPath();
    c.arc(this.pos.x, this.pos.y, this.flick ? Math.random() * this.size : this.size, 0, Math.PI * 2, true);
    c.closePath();
    c.fill();

    c.restore();
};

Particle.prototype.exists = function() {
    return this.alpha >= 0.1 && this.size >= 1;
};

function Rocket(x) {
    Particle.apply(this, [{
        x: x,
        y: SCREEN_HEIGHT}]);

    this.explosionColor = 0;
}

Rocket.prototype = new Particle();
Rocket.prototype.constructor = Rocket;

Rocket.prototype.explode = function() {
    var count = Math.random() * 10 + 80;

    for (var i = 0; i < count; i++) {
        var particle = new Particle(this.pos);
        var angle = Math.random() * Math.PI * 2;

        // emulate 3D effect by using cosine and put more particles in the middle
        var speed = Math.cos(Math.random() * Math.PI / 2) * 15;

        particle.vel.x = Math.cos(angle) * speed;
        particle.vel.y = Math.sin(angle) * speed;

        particle.size = 10;

        particle.gravity = 0.2;
        particle.resistance = 0.92;
        particle.shrink = Math.random() * 0.05 + 0.93;

        particle.flick = true;
        particle.color = this.explosionColor;

        particles.push(particle);
    }
};

Rocket.prototype.render = function(c) {
    if (!this.exists()) {
        return;
    }

    c.save();

    c.globalCompositeOperation = 'lighter';

    var x = this.pos.x,
        y = this.pos.y,
        r = this.size / 2;

    var gradient = c.createRadialGradient(x, y, 0.1, x, y, r);
    gradient.addColorStop(0.1, "rgba(255, 255, 255 ," + this.alpha + ")");
    gradient.addColorStop(1, "rgba(0, 0, 0, " + this.alpha + ")");

    c.fillStyle = gradient;

    c.beginPath();
    c.arc(this.pos.x, this.pos.y, this.flick ? Math.random() * this.size / 2 + this.size / 2 : this.size, 0, Math.PI * 2, true);
    c.closePath();
    c.fill();

    c.restore();
};