import { Routes, Route } from 'react-router-dom';
import Header from './components/Header';
import Footer from './components/Footer'; // Import Footer
import Home from './pages/Home';
import Shop from './pages/Shop';
import ProductDetail from './pages/ProductDetail';
import Cart from './pages/Cart';
import Checkout from './pages/Checkout';
import OrderDetail from './pages/OrderDetail';

function App() {
  return (
    <>
      <div className="d-flex flex-column min-vh-100">
        {/* Wrapper này giúp Footer luôn bị đẩy xuống đáy nếu nội dung ngắn */}

        <Header />

        <div className="flex-grow-1"> {/* Phần nội dung chính sẽ giãn ra */}
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/shop" element={<Shop />} />
            <Route path="/product/:id" element={<ProductDetail />} />
            <Route path="/cart" element={<Cart />} />
            <Route path="/checkout" element={<Checkout />} />
            <Route path="/order-detail/:id" element={<OrderDetail />} />
          </Routes>
        </div>
        <Footer /> {/* Footer nằm ở đây */}
      </div>
    </>
  );
}

export default App;