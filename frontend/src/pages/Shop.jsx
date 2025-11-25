import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import { API_URL } from '../config';

export default function Shop() {
    const [products, setProducts] = useState([]);
    const [categories, setCategories] = useState([]);
    const [selectedCat, setSelectedCat] = useState(null);

    useEffect(() => {
        // Lấy danh mục
        axios.get(`${API_URL}/categories.php`).then(res => setCategories(res.data));
        // Lấy sản phẩm (mặc định lấy hết)
        fetchProducts();
    }, []);

    const fetchProducts = (catId = null) => {
        let url = `${API_URL}/products.php`;
        if (catId) url += `?category_id=${catId}`;

        axios.get(url).then(res => setProducts(res.data));
        setSelectedCat(catId);
    };

    return (
        <div className="container mt-4">
            <div className="row">
                {/* Sidebar Danh mục */}
                <div className="col-md-3">
                    <div className="list-group">
                        <button
                            className={`list-group-item list-group-item-action ${selectedCat === null ? 'active' : ''}`}
                            onClick={() => fetchProducts(null)}
                        >
                            Tất cả sản phẩm
                        </button>
                        {categories.map(c => (
                            <button
                                key={c.id}
                                className={`list-group-item list-group-item-action ${selectedCat === c.id ? 'active' : ''}`}
                                onClick={() => fetchProducts(c.id)}
                            >
                                {c.name}
                            </button>
                        ))}
                    </div>
                </div>

                {/* Danh sách sản phẩm */}
                <div className="col-md-9">
                    <div className="row">
                        {products.length > 0 ? products.map(p => (
                            <div className="col-md-4 mb-4" key={p.id}>
                                <div className="card h-100 shadow-sm">
                                    <img src={p.thumbnail} className="card-img-top" style={{ height: '180px', objectFit: 'contain', padding: '10px' }} alt={p.name} />
                                    <div className="card-body d-flex flex-column">
                                        <h5 className="card-title">{p.name}</h5>
                                        <div className="mt-auto">
                                            <p className="text-danger fw-bold mb-2">${Number(p.price).toLocaleString()}</p>
                                            <Link to={`/product/${p.id}`} className="btn btn-primary w-100">Mua ngay</Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        )) : <p className="text-center">Không có sản phẩm nào.</p>}
                    </div>
                </div>
            </div>
        </div>
    );
}