import React, { useState } from 'react';
import { useCart } from '../context/CartContext';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import { API_URL } from '../config';

export default function Checkout() {
    const { cart, totalMoney, clearCart } = useCart();
    const navigate = useNavigate();
    const [formData, setFormData] = useState({
        customer_name: '', customer_email: '', customer_phone: '', customer_address: ''
    });

    const handleSubmit = async (e) => {
        e.preventDefault();
        const orderData = { ...formData, total_money: totalMoney, cart: cart };

        try {
            const res = await axios.post(`${API_URL}/checkout.php`, orderData);
            if (res.data.status === 'success') {
                clearCart();
                // Chuyển hướng đến trang chi tiết đơn hàng vừa tạo
                navigate(`/order-detail/${res.data.order_id}`);
            }
        } catch (error) {
            alert("Đặt hàng thất bại!");
        }
    };

    return (
        <div className="container mt-5">
            <h2 className="mb-4">Thanh toán</h2>
            <div className="row">
                <div className="col-md-7">
                    <div className="card p-4 shadow-sm">
                        <form onSubmit={handleSubmit}>
                            <h4 className="mb-3">Thông tin giao hàng</h4>
                            <div className="mb-3">
                                <label>Họ tên</label>
                                <input type="text" className="form-control" required
                                    onChange={e => setFormData({ ...formData, customer_name: e.target.value })} />
                            </div>
                            <div className="row mb-3">
                                <div className="col">
                                    <label>Email</label>
                                    <input type="email" className="form-control" required
                                        onChange={e => setFormData({ ...formData, customer_email: e.target.value })} />
                                </div>
                                <div className="col">
                                    <label>Số điện thoại</label>
                                    <input type="text" className="form-control" required
                                        onChange={e => setFormData({ ...formData, customer_phone: e.target.value })} />
                                </div>
                            </div>
                            <div className="mb-3">
                                <label>Địa chỉ nhận hàng</label>
                                <textarea className="form-control" rows="3" required
                                    onChange={e => setFormData({ ...formData, customer_address: e.target.value })}></textarea>
                            </div>
                            <button className="btn btn-primary w-100 btn-lg" type="submit">Xác nhận đặt hàng</button>
                        </form>
                    </div>
                </div>
                <div className="col-md-5">
                    <div className="card p-4 bg-light">
                        <h4>Đơn hàng của bạn</h4>
                        <hr />
                        <ul className="list-unstyled">
                            {cart.map(item => (
                                <li key={item.id} className="d-flex justify-content-between mb-2">
                                    <span>{item.name} <small>x {item.qty}</small></span>
                                    <span>${(item.price * item.qty).toLocaleString()}</span>
                                </li>
                            ))}
                        </ul>
                        <hr />
                        <div className="d-flex justify-content-between fw-bold fs-5">
                            <span>Tổng tiền:</span>
                            <span className="text-danger">${totalMoney.toLocaleString()}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}