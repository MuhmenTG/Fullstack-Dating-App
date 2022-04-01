/*var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
export class HttpRequest {
    static server(url, methodType, data, key) {

        return __awaiter(this, void 0, void 0, function* () {
            try {
                let response;
                if (data != undefined && key != undefined) {
                    response = yield fetch(url, {
                        method: methodType,
                        body: JSON.stringify({ key: data })
                    });
                }
                else if (data != undefined) {
                    response = yield fetch(url, {
                        method: methodType,
                        body: JSON.stringify(data)
                    });
                   
                }
                else {
                    response = yield fetch(url, {
                        method: methodType
                    });
                }
                 
                return yield response.json();
            }
            catch (error) {
                console.log(error);
            }
        });
    }
}*/
 

export class HttpRequest {
    static async server(url, methodType, data, key)  {
        try 
            {
            let response;
            if(data != undefined && key != undefined)
            {
                response = await fetch(url, {
                    method: methodType,
                    body: JSON.stringify({ key: data })
                });
            }
            else if(data != undefined){
                response = await fetch(url, {
                    method: methodType,
                    body: JSON.stringify(data)
                });
            }
            else{
                response = await fetch(url, {
                    method: methodType
                });
            }
       // console.log(await response.json() );return;
            return await response.json();       
        } 
        catch (error) 
        {
            console.log(error);
        }
    }

}