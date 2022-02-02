export class HttpRequest {
    async serverHttpRequest(url:string, methodType:string, data?:Object, key?:string|number) : Promise<Response | undefined> {
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