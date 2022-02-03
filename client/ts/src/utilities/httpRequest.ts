import { key, methodType, urlPath } from "../inc/types";

export class HttpRequest {
    static async server<T>(url:urlPath, methodType:methodType, data?:Object, key?:key) : Promise<T | undefined> {
        try 
            {
            let response:any;
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
            return await response.json();       
        } 
        catch (error) 
        {
            console.log(error);
        }
    }

}