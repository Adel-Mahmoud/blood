
// src/firebase.js
import { initializeApp } from "firebase/app";
import { getAuth, GoogleAuthProvider, signInWithPopup, signOut } from "firebase/auth";
import { getFirestore, doc, setDoc, getDoc, collection, query, where, getDocs } from "firebase/firestore";

const firebaseConfig = {
    apiKey: "AIzaSyDb_-Pl7fMEQiBnYmi1TqZeASQMSLbwAnk",
    authDomain: "alaa-760fd.firebaseapp.com",
    databaseURL: "https://alaa-760fd.firebaseio.com",
    projectId: "alaa-760fd",
    storageBucket: "alaa-760fd.firebasestorage.app",
    messagingSenderId: "110443455564",
    appId: "1:110443455564:web:78a530522599d8aa5680e9",
    measurementId: "G-PNT0S6D9MT"
};

const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);
export const db = getFirestore(app);
export const googleProvider = new GoogleAuthProvider();

export const signInWithGoogle = async () => {
  try {
    const result = await signInWithPopup(auth, googleProvider);
    return result.user;
  } catch (error) {
    console.error("Google Sign-In Error:", error);
    throw error;
  }
};

export const logout = async () => {
  await signOut(auth);
};