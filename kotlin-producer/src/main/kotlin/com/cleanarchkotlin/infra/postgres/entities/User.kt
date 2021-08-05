package com.cleanarchkotlin.infra.postgres.entities

import io.quarkus.hibernate.orm.panache.kotlin.PanacheEntity
import javax.persistence.Entity
import javax.persistence.GeneratedValue
import javax.persistence.GenerationType
import javax.persistence.Id

@Entity(name = "users")
class User {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    var user_id: Long? = null;

    lateinit var name: String
    lateinit var email: String
    lateinit var password: String

}