var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
import { HttpRequest } from "./httpRequest";
export class Session {
    isLoggedIn() {
        return __awaiter(this, void 0, void 0, function* () {
            let isLoggedIn = yield HttpRequest.server("../api/checkSession.php", "POST");
            return isLoggedIn;
        });
    }
    getCurrentUserId() {
        return __awaiter(this, void 0, void 0, function* () {
            const userId = yield HttpRequest.server("../api/returnCurrentSessionId.php", "POST");
            return (userId) ? userId : false;
        });
    }
}
