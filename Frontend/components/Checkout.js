import React from "react";
import { Linking } from "react-native";
import {
    StyleSheet,
    Text,
    View,
    TextInput,
    TouchableOpacity,
} from "react-native";



const Checkout = ({detallesPedido, handleCrearOrden}) => {
    const openCheckoutLink = async () => {
        const url = "https://recarga.nequi.com.co/bdigitalpsl/#!/";
        const supported = await Linking.canOpenURL(url);
        
        if (supported) {
            if (detallesPedido && handleCrearOrden) {
                handleCrearOrden(); // Llama a handleCrearOrden al presionar Checkout
            } else {
                console.error("No se pudo enviar el pedido.");
            }
        } else {
            console.error("No se pudo abrir el enlace.");
        }
    };

    return (
        <View>
        <TouchableOpacity style={styles.btn} onPress={openCheckoutLink}>
          {/* checkout button  */}
            <Text style={styles.btnText}>Checkout</Text>
        </TouchableOpacity>
        </View>
    );
    };
    
  // button and text styles
    const styles = StyleSheet.create({
    btn: {
        backgroundColor: "#c2bad8",
        padding: 9,
        margin: 5,
    },
    btnText: {
        color: "darkslateblue",
        fontSize: 20,
        textAlign: "center",
    },
    });
    
    export default Checkout;