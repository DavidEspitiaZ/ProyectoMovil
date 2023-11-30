import React, { useEffect, useState } from "react";
import { StyleSheet, Text, View, FlatList,Image, Alert } from "react-native";
import ListItem from "../components/ListItem";
import Checkout from "../components/Checkout";
import Menu from "../components/MenuShopping";
import axios from 'axios';
import AsyncStorage from '@react-native-async-storage/async-storage';



const ShoppingCart = ({ route }) => {
      const [isLoading, setLoading] = useState(true);
      const [data, setData] = useState([]);
      const [cartItems, setCartItems] = useState(route.params.cartItems || []);
      const [total, setTotal] = React.useState(0);
      // const [detallesPedido, setDetallesPedido] = useState({
      //   order_date: '', // Se utiliza la fecha formateada
      //   total_price: '', // Precio total
      //   state_order: '', // Estado inicial de la orden
      //   id_profile: '', // ID del usuario actual
      //   id_payment_method: '', // Método de pago por defecto
      //   cartItems:''
      // });

  useEffect(() => {
    setData(cartItems); //Utiliza los datos locales del ejemplo "products.json"
    setLoading(false);
    }, []);

  //add an item to cart
  const AddCartItem = (item) => {
    const existingItem = cartItems.find((cartItem) => cartItem.id === item.id);

  if (existingItem) {
    const updatedCartItems = cartItems.map((cartItem) =>
      cartItem.id === item.id ? { ...cartItem, quantity: cartItem.quantity + 1 } : cartItem
    );
    setCartItems(updatedCartItems);
  } else {
    const newItem = { ...item, quantity: 1 };
    setCartItems([...cartItems, newItem]);
  }

  setTotal(total + parseInt(item.price_product));
};
  //remove an item from cart
    const RemoveCartItem = (item) => {
    const updatedCartItems = cartItems.filter((cartItem) => cartItem.id !== item.id);
    setCartItems(updatedCartItems);
    setTotal(total - parseInt(item.price_product));
    };

  //remove an item
    const deleteItem = (id, itemPrice) => {
      setData((prevItems) => prevItems.filter((item) => item.id !== id));
      // Restar el precio del artículo eliminado del total
      setTotal(total - parseInt(itemPrice));
    };


    
    // const handleCrearOrden = async () => {
    //   try {
    //   // Recuperar el token guardado
    //   const token = await AsyncStorage.getItem('token');

    //   // Utilizar el token como sea necesario (ejemplo de uso)
    //   const decodedToken = jwt_decode(token);
    //   const userId = decodedToken.sub;

    //   // Resto de tu código para enviar la orden con el token
    // } catch (error) {
    //   console.error('Error en la solicitud POST:', error);
    //   Alert.alert('Error', 'No se ha podido registrar la orden.');
    // }

    //   const currentDate = new Date(); // Obtiene la fecha actual
    //     const formattedDate = currentDate.toISOString().split('T')[0];
        
    //     const datos = {
    //     order_date: formattedDate,
    //   total_price: total,
    //   state_order: 'pendiente',
    //   id_profile: userId,
    //   id_payment_method: 'nequi',
    //   cartItems: cartItems,
    // };
    // try {
    //   const response = await axios.post('http://127.0.0.1:8000/api/order/', datos);
    //   console.log('Orden Guardada.', response.data);
  
    //   } catch (error) {
    //   console.error('Error en la solicitud POST:', error);
    //   Alert.alert('Error', 'No se ha podido registrar la orden.');
    //   }

    //   }

      
    return (
    <View style={styles.container}>
      <View style={styles.menuColumn}>
        <Menu navigation={navigation} />
      </View>
      <View style={styles.content}>
        <FlatList
          data={data}
          renderItem={({ item }) => (
            <ListItem
              item={item}
              AddCartItem={AddCartItem}
              RemoveCartItem={RemoveCartItem}
              deleteItem={() => deleteItem(item.id, item.price)}
            />
          )}
        />
        <Text style={styles.listItemTextTotal}>Total: ${total.toLocaleString()}</Text>
        <Checkout 
        // detallesPedido={detallesPedido} handleCrearOrden={handleCrearOrden}
        />
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    flexDirection: "row", // Distribución en filas
  },
  menuColumn: {
    flex: 1, // Toma el 1/3 del espacio disponible
    backgroundColor: "#f0f0f0", // Color de fondo del menú (opcional)
    padding: 2, // Ajustes de espaciado interno
  },
  content: {
    flex: 2, // Toma el 2/3 del espacio disponible
    padding: 20, // Ajustes de espaciado interno
  },
  listItemTextTotal: {
    fontSize: 22,
    textAlign: "center",
  },
});

export default ShoppingCart;