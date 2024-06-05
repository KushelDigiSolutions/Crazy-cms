<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrazyCMS Editor</title>
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <style>
        body, html {
            margin: 0;
            height: 100%;
        }
        #gjs {
            height: 100vh;
        }
        
    </style>
</head>
<body>
    <div id="gjs">
 <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');


body{
  font-family: 'Roboto', sans-serif;
}

header {
  background-image: url('https://images.unsplash.com/photo-1537432376769-00f5c2f4c8d2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=625&q=80');
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  height: 100vh;
  width: 100%;
  clip-path: polygon(50% 0%, 100% 0, 100% 60%, 73% 100%, 25% 93%, 0 100%, 0 0);


}


*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
}

.navbar{
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 30px 50px;
  background: #0c02085e;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;


}

.brand-name{
  width: 20%;
}
.menu{
  width: 80%;
  text-align: right;
}
.menu li{
  display: inline-block;
  font-weight: bolder;
   padding: 0 20px;
}

.nav-item a{
  color: #fff;
}
.brand-name a{
  color: #fff;
}

.clr,.active{
  color:#ED553D !important; 
}


.header-content{
  text-align: center;
  padding: 145px 0;
  align-items:center;
  width: 100%;
 background: #0c020894;
 
}


.header-main-content p{
  color: #f2f2f2;
}

.header-main-content h1{
   font-size: 75px;
   color: #FFF;
}

a.header-btn{
  display: block;
  margin: auto;
  margin-top: 40px;
   height: 60px;
   width: 220px;
   font-size: 18px;
   color: #fff;
   padding: 0 12px;
   background: #ED553D;
   line-height: 60px;
   border-radius: 30px;
}


 </style>
    <!-- HTML NAVAR -->
     <nav class="navbar">
       <!-- logo brand name -->
         <div class="brand-name">
            <h2>
              <a href="#">Creative <span class="clr">Babar</span> </a></h2>
         </div>
      <ul class="menu">
        <li class="nav-item"><a href="#" class="navlink active">Home</a></li>
        <li class="nav-item"><a href="#" class="navlink">About</a></li>
        <li class="nav-item"><a href="#" class="navlink">Contact</a></li>
        <li class="nav-item"><a href="#" class="navlink">Privacy</a></li>
        <li class="nav-item"><a href="#" class="navlink">Singup</a></li>
     </ul>

     </nav>
     <!-- end nav -->


     <!-- Header Content -->
 <div class="header-content">
    <div class="header-main-content">
       <p>We Offer Free Course.</p>
       <h1>Learn For Free 
        <span class="clr">Complete</span>
         Web Deveolpment
      </h1>
        <a href="#" class="header-btn">Learn More</a>
    </div>
 </div>


    </div>

    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://unpkg.com/grapesjs-blocks-basic"></script>
    <script>
        const editor = grapesjs.init({
            container: '#gjs',
            fromElement: true,
            height: '100%',
            width: 'auto',
            storageManager: {
                autoload: 0,
            },
            plugins: ['gjs-blocks-basic'],
        });

        editor.Panels.addButton('options', [{
            id: 'save',
            className: 'fa fa-floppy-o',
            command: 'save-html',
            attributes: { title: 'Save' }
        }]);

        editor.Commands.add('save-html', {
            run(editor, sender) {
                sender.set('active', false);
                const html = editor.getHtml();
                const css = editor.getCss();
                console.log('HTML: ', html);
                console.log('CSS: ', css);
                alert('Check the console for HTML and CSS');
            }
        });
    </script>
</body>
</html>
