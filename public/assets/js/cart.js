class Cart {
  constructor(cartName) {
    this.cartName=cartName;      
  }

  // ==========Methods============

  get(){
    let cart=localStorage.getItem(this.cartName);
    cart=JSON.parse(cart);
    return cart;
   }//end getCart

  add(product){
    //product=JSON.parse(product); 
    //console.log(product);
     //product.qty=1;

    let cart= localStorage.getItem(this.cartName);
   
    if(cart!=null){           
      cart=JSON.parse(cart);
      
      let found=cart.find((item)=>{
          return item.id==product.id;
      });

      if(found==null){
          //product.qty=1;
          cart.push(product);
          localStorage.setItem(this.cartName, JSON.stringify(cart));
      }else{       
          
            found.qty++;
          
         
          localStorage.setItem(this.cartName, JSON.stringify(cart));
      }

    }else{
      cart=[];
      cart.push(product);
      localStorage.setItem(this.cartName, JSON.stringify(cart));
    }
  }//end save

  getTotal(){
    let items=this.get();
    let total=0;
    items.forEach(item => {
      total+=item.qty*item.price;
    });
    return total;
  }
  inc(id,qty=1){
    //console.log(id)
    let cart= localStorage.getItem(this.cartName);
    if(cart!=null){
      cart=JSON.parse(cart);     
      let found=cart.find(item=>{
          return item.id==id;
      })

      if(found!=undefined){
          found.qty+=qty;           
      }
  

     }  
                
      localStorage.setItem(this.cartName, JSON.stringify(cart));
    
 }//end QtyUp
    

 dec(id,qty=1){
    let cart= localStorage.getItem(this.cartName);
    if(cart!=null){
      cart=JSON.parse(cart);   
      let found=cart.find(item=>{
          return item.id==id;
      })

      if(found!=undefined){
          found.qty-=qty;
          if(found.qty<1)found.qty=1;
      }

      localStorage.setItem(this.cartName,JSON.stringify(cart));
    }
 }//end delItem

 delete(id){
  let cart= localStorage.getItem(this.cartName);
  if(cart!=null){
    cart=JSON.parse(cart);
    let index=cart.findIndex((item)=>{
      return item.id==id;
    });
    cart.splice(index,1);
    localStorage.setItem(this.cartName,JSON.stringify(cart));
  }
 }
  
 clear(){
      localStorage.removeItem(this.cartName);             
      localStorage.setItem(this.cartName, JSON.stringify([]));      
 } //end clearCart
  
  
}//end class