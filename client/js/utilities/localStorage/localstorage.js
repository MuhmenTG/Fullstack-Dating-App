import { CART_KEY } from "../../api";


function setToLocalStorage(key, value){
    localStorage.setItem(key, JSON.stringify(value));
}

function getFromLocalStorage(key){
   return localStorage.getItem(key)
}

export function setCartToLocalStorage(value){
    setToLocalStorage(CART_KEY, value)
}

export function getCartFromLocalStorage(){
   return getFromLocalStorage(CART_KEY)
}

