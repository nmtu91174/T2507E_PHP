import React from 'react';
import { Link, NavLink } from 'react-router-dom';
import { useCart } from '../context/CartContext';

export default function Header() {
    // Lấy giỏ hàng từ Context để tính tổng số lượng sản phẩm
    const { cart } = useCart();

    // Tính tổng số lượng item (ví dụ: mua 2 cái áo + 1 cái quần = 3)
    const totalItems = cart.reduce((acc, item) => acc + item.qty, 0);

    return (
        <nav className="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
            <div className="container">
                {/* 1. Logo Thương hiệu */}
                <Link className="navbar-brand fw-bold text-uppercase" to="/">
                    <i className="fas fa-store me-2 text-warning"></i>
                    T2507E Store
                </Link>

                {/* Nút toggle cho Mobile */}
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span className="navbar-toggler-icon"></span>
                </button>

                <div className="collapse navbar-collapse" id="navbarContent">
                    {/* 2. Thanh tìm kiếm (Giữa) */}
                    <form className="d-flex mx-auto my-2 my-lg-0" style={{ maxWidth: '400px', width: '100%' }}>
                        <div className="input-group">
                            <input className="form-control" type="search" placeholder="Tìm kiếm sản phẩm..." />
                            <button className="btn btn-warning" type="submit">
                                <i className="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    {/* 3. Menu bên phải */}
                    <ul className="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                        <li className="nav-item">
                            <NavLink className="nav-link" to="/">Trang chủ</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className="nav-link" to="/shop">Cửa hàng</NavLink>
                        </li>

                        {/* Mục Tài khoản (Demo) */}
                        <li className="nav-item dropdown">
                            <a className="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i className="fas fa-user-circle me-1"></i> Tài khoản
                            </a>
                            <ul className="dropdown-menu dropdown-menu-end">
                                <li><Link className="dropdown-item" to="/login">Đăng nhập</Link></li>
                                <li><Link className="dropdown-item" to="/register">Đăng ký</Link></li>
                                <li><hr className="dropdown-divider" /></li>
                                <li><Link className="dropdown-item" to="/order-history">Đơn hàng của tôi</Link></li>
                            </ul>
                        </li>

                        {/* 4. Giỏ hàng (Có Badge số lượng) */}
                        <li className="nav-item ms-lg-3">
                            <Link to="/cart" className="btn btn-outline-light position-relative">
                                <i className="fas fa-shopping-cart"></i>
                                {totalItems > 0 && (
                                    <span className="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {totalItems}
                                    </span>
                                )}
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    );
}