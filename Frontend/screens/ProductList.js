import React, { useState, useEffect } from "react";
import { View, Text, FlatList, StyleSheet, Image, TouchableOpacity, Modal , TouchableWithoutFeedback} from "react-native";
import { Feather } from '@expo/vector-icons'; // Importamos el icono de Feather
import { MaterialIcons } from '@expo/vector-icons'; // Importamos el icono de MaterialIcons
import Menu from "../components/MenuList";

const ProductList = ({ navigation }) => {
  const [isLoading, setLoading] = useState(true);
  const [selectedProduct, setSelectedProduct] = useState(null);
  const [cart, setCart] = useState([]);
  const [data, setData] = useState([]);
  const [modalVisible, setModalVisible] = useState(false);

  const addToCart = (product) => {
    setCart([...cart, product]);
  };

  useEffect(() => {
    // Función para obtener todos los productos desde tu backend
    const fetchProductsFromBackend = async () => {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/product');
        const data = await response.json();
        setData(data); // Actualiza el estado con los productos obtenidos
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    };

    // Llama a la función para obtener los productos al cargar el componente
    fetchProductsFromBackend();
  }, []);


  const renderItem = ({ item }) => {
    return(
    <TouchableOpacity
      style={styles.productCard}
      onPress={() => {
        setSelectedProduct(item);
        setModalVisible(true);
      }}
    >
      <Image source={{ uri: item.image }} style={styles.productImage} />
      <Text style={styles.productName}>{item.name_product}</Text>
      <Text style={styles.productPrice}>{item.description_product}</Text>
      <Text style={styles.productPrice}>${item.price_product}</Text>
    </TouchableOpacity>
    )
};
    
  const goToShoppingCart = () => {
    navigation.navigate('ShoppingCart', { cartItems: cart});
  };
  const closeModal = () => {
    setSelectedProduct(null);
    setModalVisible(false);
  };

  return (
    <View style={styles.container}>
      <View style={styles.menuColumn}>
      <Menu navigation={navigation} />
      </View>
      <TouchableOpacity
        style={styles.cartIconContainer}
        onPress={goToShoppingCart}>
        <Feather name="shopping-cart" size={24} color="black" />
        <Text style={styles.cartItemCount}>{cart.length}</Text>
      </TouchableOpacity>
      <FlatList
        data={data}
        keyExtractor={(item) => item.id.toString()}
        renderItem={renderItem}
        numColumns={2}
        columnWrapperStyle={styles.row}
      />
      <Modal
        animationType="slide"
        transparent={true}
        visible={modalVisible}
        onRequestClose={closeModal}
      >
        <TouchableWithoutFeedback onPress={closeModal}>
          <View style={styles.modalContainer}>
            <TouchableWithoutFeedback>
              <View style={styles.modalContent}>
                {selectedProduct && (
                  <>
                <Image source={{ uri: `https://127.0.0.1:8000/${selectedProduct.image}` }} style={styles.productImageModal} />
                <Text style={styles.productNameModal}>{selectedProduct.name_product}</Text>
                <Text style={styles.productPriceModal}>
                ${parseInt(selectedProduct.price_product).toLocaleString()}
                </Text>
                <TouchableOpacity
                  style={styles.addToCartButtonModal}
                  onPress={() => {
                    addToCart(selectedProduct);
                    closeModal()
                }}
                >
                  <Text style={styles.addToCartButtonText}>Añadir al carrito</Text>
                </TouchableOpacity>
              </>
            )}
          </View>
          </TouchableWithoutFeedback>
        </View>
        </TouchableWithoutFeedback>
      </Modal>
    </View>
    );
};



const styles = StyleSheet.create({
    container: {
    flex: 1,
    backgroundColor: "#F5EFE0",
    padding: 20,
  },
  menuColumn: {
    flex: 1, // Toma el 1/3 del espacio disponible
    backgroundColor: "#f0f0f0", // Color de fondo del menú (opcional)
    padding: 20, // Ajustes de espaciado interno
  },
  productCard: {
    backgroundColor: "white",
    padding: 10,
    marginBottom: 10,
    borderRadius: 5,
    flex: 0.48,
  },
  productImage: {
    width: "100%",
    height: 150,
    resizeMode: "cover",
    borderRadius: 5,
  },
  productName: {
    fontSize: 16,
    fontWeight: "bold",
    marginTop: 5,
  },
  productPrice: {
    fontSize: 14,
    color: "gray",
  },
  modalContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: 'rgba(0, 0, 0, 0.5)',
  },
  modalContent: {
    backgroundColor: 'white',
    padding: 20,
    borderRadius: 5,
    alignItems: 'center',
  },
  productImageModal: {
    width: 200,
    height: 200,
    resizeMode: "cover",
    marginBottom: 10,
  },
  productNameModal: {
    fontSize: 20,
    fontWeight: "bold",
    marginBottom: 5,
  },
  productPriceModal: {
    fontSize: 18,
    marginBottom: 10,
  },
  addToCartButtonModal: {
    backgroundColor: "#007AFF",
    padding: 10,
    borderRadius: 5,
    marginBottom: 10,
    width: '80%',
    alignItems: 'center',
  },
  addToCartButtonText: {
    color: "white",
    fontWeight: "bold",
  },
  closeButtonModal: {
    backgroundColor: "red",
    padding: 10,
    borderRadius: 5,
    marginTop: 10,
    width: '80%',
    alignItems: 'center',
  },
  closeButtonText: {
    color: "white",
    fontWeight: "bold",
  },
  cartIconContainer: {
    position: 'absolute',
    top: 20,
    right: 20,
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: 'white',
    padding: 10,
    borderRadius: 50,
    zIndex: 1,
  },
  cartItemCount: {
    marginLeft: 5,
    fontWeight: 'bold',
  },
  row: {
    flex: 1,
    justifyContent: "space-between",
  },
});

export default ProductList;
