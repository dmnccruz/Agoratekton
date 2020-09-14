<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <script type="text/javascript" src="{{asset('/js/three.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/GLTFLoader.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/OrbitControls.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/tippy.js@6/animations/scale.css"/>
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/magic-mouse.css')}}">


    <title>AGORATEKTON | LANDING PAGE</title>
</head>
<body>

<div id="loginFormsWrapper">
  <div id="loginWindow">
    <div onclick="exitLogin(this)" id="exitLogin" class="fa fa-remove"></div>
    <div id="loginIcon">
      <img width="30%" src="{{asset('/images/icons/rhombus_200_transparent.gif')}}" alt="">
    </div>
    <div id="loginEmail">
      <input id="loginEmailInput" class="loginInputForm magic-hover magic-hover__square" type="text" name="email" placeholder="email">
    </div>
    <div id="loginPassword">
      <input id="loginPasswordInput" class="loginInputForm magic-hover magic-hover__square" type="password" name="password" placeholder="password">
    </div>
    <div id="loginButton2" onclick="goLogin()">Login</div>
  </div>
</div>

<div id="registerFormsWrapper">
  <div id="successRegisterWindow">
    <img width="30%" src="{{asset('/images/icons/handshake_200_transparent.gif')}}" alt="">
    <h3>Registration successful!</h3>
  </div>

  <div id="registerWindow">
    <div  onclick="exitRegister(exitRegister)"  id="exitRegister" class="fa fa-remove"></div>
    <div id="registerPic">
      <div id="registerProfilePic">
        <img width="30%" src="{{asset('/images/icons/download_200_transparent.gif')}}" alt="">
      </div>
    </div>
    <div id="registerRole">
      <div id="roleRegular" class="roles roleActive magic-hover magic-hover__square" data-role="regular">Regular</div>
      <div id="roleArchitect" class="roles magic-hover magic-hover__square" data-role="architect">Architect</div>
      <div id="roleSupplier" class="roles magic-hover magic-hover__square" data-role="supplier">Supplier</div>
    </div>
    <div id="registerName">
      <input class="registerInputForm magic-hover magic-hover__square" type="text" name="name" placeholder="enter your name.">
    </div>
    <div id="registerEmail">
      <input class="registerInputForm magic-hover magic-hover__square" type="text" name="email" placeholder="email address">
    </div>
    <div id="registerPassword">
      <input class="registerInputForm magic-hover magic-hover__square" type="password" name="password" placeholder="password">
    </div>
    <div id="registerConfirmPassword">
      <input class="registerInputForm magic-hover magic-hover__square" type="password" name="confirmPassword" placeholder="confirm your password">
    </div>
    <div id="registerButtonMain">Register</div>
  </div>
</div>

<div id="buttonsWrapper">
  <div id="buttonsWrapperb">
    <div onclick="openLogin()" id="loginButton" class="buttons">LOGIN</div>
    <div onclick="openRegister()" id="registerButton" class="buttons">REGISTER</div>
  </div>
</div>

<div id="wordsWrapper">
  <div id="wordsWrapper2">
    <img id="agora" width="50%" src="{{asset('/images/agora.png')}}" alt="">
    <img id="agorameaning" width="100%" src="{{asset('/images/agorameaning.png')}}" alt="">
    <img id="tekton" width="50%" src="{{asset('/images/tekton.png')}}" alt="">
    <img id="tektonmeaning" width="100%" src="{{asset('/images/tektonmeaning.png')}}" alt="">
  </div>
</div>

<div id="linesWrap2">
  <div id="horizontalLine">
    <div id="horizontalLineb"></div>
  </div>
  <div id="horizontalLine2"></div>
  <div id="horizontalLine3"></div>
</div>

<div id="linesWrap">
  <div id="linesContainer">
    <div id="a" class="svgLetterLines"></div>
    <div id="g" class="svgLetterLines"></div>
    <div id="o" class="svgLetterLines"></div>
    <div id="r" class="svgLetterLines">
      <div class="svgLetterLines2"></div>
      <div class="svgLetterLines2"></div>
      <div class="svgLetterLines2"></div>
    </div>
    <div id="a2" class="svgLetterLines"></div>
    <div id="t" class="svgLetterLines"></div>
    <div id="e" class="svgLetterLines"></div>
    <div id="k" class="svgLetterLines">
    <div style=""></div>
      <div class="svgLetterLines2"></div>
      <div class="svgLetterLines2"></div>
      <div class="svgLetterLines2"></div>
    </div>
    <div id="t2" class="svgLetterLines"></div>
    <div id="o2" class="svgLetterLines"></div>
    <div id="n" class="svgLetterLines"></div>
  </div>
</div>

<div id="agoraWrap">
  <div id="svgContainer">
    <div class="svgLetter">
        <svg id="agora1" width="100%" height="100%" viewBox="0 0 307 421" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M60.2 403H281L153.8 53.1999L20 421H0.799988L153.8 0.399902L306.8 421H60.2V403Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
        </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora2" width="89%" height="100%" viewBox="0 0 280 432" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M257.6 90.6C248.4 67.4 235.4 49.6 218.6 37.2C201.8 24.4 175.6 18 140 18C120.4 18 103.6 20.6 89.6 25.8C75.6 30.6 63 39 51.8 51C40.6 63 32.2 80.4 26.6 103.2C21 125.6 18.2 153.4 18.2 186.6L18.2 245.4C18.2 278.6 21 306.6 26.6 329.4C32.2 351.8 40.6 369 51.8 381C63 393 75.6 401.6 89.6 406.8C103.6 411.6 120.4 414 140 414C176 414 204.6 406.4 225.8 391.2C247 375.6 257.6 359 257.6 341.4V240H183.8V222H279.2V335.4C279.2 362.2 267 385 242.6 403.8C218.6 422.6 184.4 432 140 432C90.8 432 55.2 417 33.2 387C11.2 356.6 0.200012 309.4 0.200012 245.4L0.200012 186.6C0.200012 122.6 11.2 75.6 33.2 45.6C55.2 15.2 90.8 0 140 0C179.6 0 209.2 7.40001 228.8 22.2C248.4 36.6 263.6 57.2 274.4 84L257.6 90.6Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora3" width="89%" height="100%" viewBox="0 0 280 432" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M246.8 387C224.8 417 189.2 432 140 432C90.8 432 55.2 417 33.2 387C11.2 356.6 0.200012 309.4 0.200012 245.4L0.200012 186.6C0.200012 122.6 11.2 75.6 33.2 45.6C55.2 15.2 90.8 0 140 0C189.2 0 224.8 15.2 246.8 45.6C268.8 75.6 279.8 122.6 279.8 186.6V245.4C279.8 309.4 268.8 356.6 246.8 387ZM190.4 25.8C176.4 20.6 159.6 18 140 18C120.4 18 103.6 20.6 89.6 25.8C75.6 30.6 63 39 51.8 51C40.6 63 32.2 80.4 26.6 103.2C21 125.6 18.2 153.4 18.2 186.6L18.2 245.4C18.2 278.6 21 306.6 26.6 329.4C32.2 351.8 40.6 369 51.8 381C63 393 75.6 401.6 89.6 406.8C103.6 411.6 120.4 414 140 414C159.6 414 176.4 411.6 190.4 406.8C204.4 401.6 217 393 228.2 381C239.4 369 247.8 351.8 253.4 329.4C259 306.6 261.8 278.6 261.8 245.4V186.6C261.8 153.4 259 125.6 253.4 103.2C247.8 80.4 239.4 63 228.2 51C217 39 204.4 30.6 190.4 25.8Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora4" width="78%" height="100%" viewBox="0 0 239 420" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M47.2 402H212.8L140.2 202.8L173.8 183.6C201.4 168.4 215.2 144.2 215.2 111C215.2 49 168 18 73.6 18L18.4 18L18.4 420H0.400009L0.400009 0L73.6 0C126.4 0 166.2 9.80001 193 29.4C219.8 48.6 233.2 75.8 233.2 111C233.2 151 216.4 180.4 182.8 199.2L162.4 210.6L238.6 420H47.2V402Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora5" width="100%" height="100%" viewBox="0 0 307 421" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M60.2 403H281L153.8 53.1999L20 421H0.799988L153.8 0.399902L306.8 421H60.2V403Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora6" width="97%" height="100%" viewBox="0 0 300 420" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M300 0V18L159 18L159 420H141L141 18L0 18L0 0L300 0Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora7" width="86%" height="100%" viewBox="0 0 265 420" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M215.8 200.4H37.6L221.2 18L18.4 18L18.4 402H251.2V420H0.400024L0.400024 0L265 0L81.4 182.4H215.8V200.4Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora8" width="93%" height="100%" viewBox="0 0 285 420" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.4 0L18.4 420H0.400024L0.400024 0L18.4 0ZM265 0L63.4 200.4L284.2 420H258.4L37.6 200.4L239.2 0L265 0Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora9" width="97%" height="100%" viewBox="0 0 300 420" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M300 0V18L159 18L159 420H141L141 18L0 18L0 0L300 0Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora10" width="89%" height="100%" viewBox="0 0 280 432" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M246.8 387C224.8 417 189.2 432 140 432C90.7999 432 55.1999 417 33.1999 387C11.1999 356.6 0.199951 309.4 0.199951 245.4L0.199951 186.6C0.199951 122.6 11.1999 75.6 33.1999 45.6C55.1999 15.2 90.7999 0 140 0C189.2 0 224.8 15.2 246.8 45.6C268.8 75.6 279.8 122.6 279.8 186.6V245.4C279.8 309.4 268.8 356.6 246.8 387ZM190.4 25.8C176.4 20.6 159.6 18 140 18C120.4 18 103.6 20.6 89.6 25.8C75.6 30.6 63 39 51.7999 51C40.6 63 32.2 80.4 26.6 103.2C21 125.6 18.2 153.4 18.2 186.6L18.2 245.4C18.2 278.6 21 306.6 26.6 329.4C32.2 351.8 40.6 369 51.7999 381C63 393 75.6 401.6 89.6 406.8C103.6 411.6 120.4 414 140 414C159.6 414 176.4 411.6 190.4 406.8C204.4 401.6 217 393 228.2 381C239.4 369 247.8 351.8 253.4 329.4C259 306.6 261.8 278.6 261.8 245.4V186.6C261.8 153.4 259 125.6 253.4 103.2C247.8 80.4 239.4 63 228.2 51C217 39 204.4 30.6 190.4 25.8Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

    <div class="svgLetter">
      <svg id="agora11" width="86%" height="100%" viewBox="0 0 264 420" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M47.1999 402H233.2L18.3999 30.6L18.3999 420H0.399902L0.399902 0L21.3999 0L245.8 388.2L245.8 0L263.8 0V420H47.1999V402Z" fill="none" stroke="rgba(255, 255, 255, .75)"/>
      </svg>
    </div>

  </div>
  <div id="loaderWrapper">
    <div class="loader">
      <div id="loaderBox"></div>
      <div id="loaderBox2"></div>
    </div>
  </div>
</div>  

<script>

// const logo3 = document.querySelectorAll("#agora4 path");
// for(let i=0; i<logo3.length; i++){
//     console.log(`Letter ${i} is ${logo3[i].getTotalLength()}`);
// }

  let scene, camera, render
  function init() {
    scene = new THREE.Scene() 
    camera = new THREE.PerspectiveCamera(40, window.innerWidth/window.innerHeight,1,5000)
    camera.rotation.y = 45/180*Math.PI
    camera.position.x = 80
    camera.position.y = 10
    camera.position.z = 500

    hlight = new THREE.AmbientLight(0x404040, 10)
    scene.add(hlight)

    directionalLight = new THREE.DirectionalLight(0xffffff, 1)
    directionalLight.position.set(0,1,0)
    directionalLight.castShadow = true
    scene.add(directionalLight)

    light = new THREE.PointLight(0xE5E1A9, 1)
    light.position.set(0, 300, 500)
    scene.add(light)

    light2 = new THREE.PointLight(0xc4c4cc4, 1)
    light.position.set(500, 100, 0)
    scene.add(light2)

    light3 = new THREE.PointLight(0xc4c4cc4, 1)
    light.position.set(0, 100, -500)
    scene.add(light3)

    light4 = new THREE.PointLight(0xc4c4cc4, 1)
    light.position.set(-5000, 300, 0)
    scene.add(light4)

    renderer = new THREE.WebGLRenderer({antialias: true, alpha: true})
    renderer.setSize(window.innerWidth, window.innerHeight)
    
    controls = new THREE.OrbitControls(camera, renderer.domElement);
    document.body.appendChild(renderer.domElement)
    controls.target.set(0, 0, 0);

    let loader = new THREE.GLTFLoader()
    loader.load("{{asset('/3d/scene.gltf')}}", function(gltf){
      car = gltf.scene.children[0]
      car.scale.set(5, 5, 5)
      // car.translate(500,0,0)
      car.position.set(-25, 25, 0)
      
      scene.add(gltf.scene)
      animate();
    })
  }

  function animate() {
    renderer.render(scene,camera);
    requestAnimationFrame(animate);
    // car.rotation.x += 0.0005;
    scene.rotation.y += 0.00075;
    // car.rotation.y -= 0.0001;
  }

  // init()
</script> -->

<!-- TIPPY JS -->
<!-- <script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<script type="text/javascript" src="{{asset('/js/magic_mouse.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/landing.js')}}"></script>

</body>
</html> -->