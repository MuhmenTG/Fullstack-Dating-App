export function messageBox(element, messageType, messageColor, msg) {
    document.querySelector(`${element}`).innerHTML = `
      <span style="display:${messageType};color:${messageColor};font-size:18px;margin-left:10px;">${msg}</span>`;
}
