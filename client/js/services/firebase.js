  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.9/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.9/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAr0UigN8cdFYITnOmdyGL0jqMi8HlwXs8",
    authDomain: "risthabymuhmen.firebaseapp.com",
    projectId: "risthabymuhmen",
    storageBucket: "risthabymuhmen.appspot.com",
    messagingSenderId: "540888980014",
    appId: "1:540888980014:web:ac9b0f0eef898c8be05dbf",
    measurementId: "G-49GLGFQGH2"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
 