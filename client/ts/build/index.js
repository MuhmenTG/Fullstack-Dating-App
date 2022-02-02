import { HttpRequest } from "./utilities/httpRequest";
let response = new HttpRequest();
console.log(response.serverHttpRequest("../../../api/checkSession.php", "POST"));
