<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.3.4/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>

{{-- <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDj19AUuiD3ZW0A3eDzEavWhICzlI0i8n4",
    authDomain: "ejelaravel.firebaseapp.com",
    databaseURL: "https://ejelaravel.firebaseio.com",
    projectId: "ejelaravel",
    storageBucket: "",
    messagingSenderId: "500590801519",
    appId: "1:500590801519:web:11c2a0d7e3d063cd"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


  var starCountRef = firebase.database().ref('tag')
//   console.log(starCountRef)
    starCountRef.on('value', function(snapshot) {
        console.log(snapshot.val());


    // updateStarCount(postElement, snapshot.val());
    });

</script> --}}




<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#config-web-app -->

<script>
// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyAy16ei9G2J2tRe68w1wZy2n2yLlFPjbf8",
    authDomain: "dynamictoyiot.firebaseapp.com",
    databaseURL: "https://dynamictoyiot.firebaseio.com",
    projectId: "dynamictoyiot",
    storageBucket: "dynamictoyiot.appspot.com",
    messagingSenderId: "190898797133",
    appId: "1:190898797133:web:fcf871201e8a5102"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
var device = "{{auth()->user()->devices()->first()->mac}}"
var tagActual = firebase.database().ref('gateway/'+device+'/recursos/dispositivo_IoT/tag_actual');
tagActual.set("");

</script>

